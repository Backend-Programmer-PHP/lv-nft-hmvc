<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Users_Model;
use App\Modules\Dashboard\Models\Airdrop_Model;
use App\Modules\Dashboard\Models\Bonus_Model;
use App\Modules\Dashboard\Models\Wallet_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class KYC extends Controller
{

    public function __construct()
    {
        //Artisan::call('cache:clear');    
    }

    public function index()
    {
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_kyc') == "") {
            // if cookie not existed
            $data = Users_Model::select("users.*", "bonus.airdrop_id", "bonus.id as bonus_id", "bonus.status as bonus_status",
            "bonus.is_pay")
                ->Join("bonus", "users.id", "=", "bonus.users_id")
                ->where("users.kyc_status", 1)->orderBy('users.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Users_Model::select("users.*", "bonus.airdrop_id", "bonus.id as bonus_id", "bonus.status as bonus_status",
            "bonus.is_pay")
            ->leftJoin("bonus", "users.id", "=", "bonus.users_id")
            ->where("users.kyc_status", 1)
            ->where("users.email", "like", '%' . Cookie::get('search_kyc') . '%')
            ->orderBy('users.id', 'desc')->paginate(15);
        }
        $data->setPath('kyc');

        //foreach($data as $value){
        //array_push($data,array("data_api"=>Helper::api_kyc_post("/kyc-data",array('email'=>$value->email,'app_id'=>1))));
        //}

        $row = json_decode(json_encode([
            "title" => "Users KYC - Danh sách",
        ]));
        return view("Dashboard::kyc.index", compact("row", "settings", "data"));
    }


    public function transfer(){
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_kyc') == "") {
            // if cookie not existed
            $data = Users_Model::select("users.*", "bonus.airdrop_id", "bonus.id as bonus_id", "bonus.status as bonus_status",
            "bonus.hash_wta",
            "bonus.is_pay")
                ->leftJoin("bonus", "users.id", "=", "bonus.users_id")
                ->where("bonus.status", 0)
                ->orWhere("bonus.is_pay", 1)
                ->orderBy('users.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Users_Model::select("users.*", "bonus.airdrop_id", "bonus.id as bonus_id", 
            "bonus.status as bonus_status",
            "bonus.hash_wta",
            "bonus.is_pay")
            ->leftJoin("bonus", "users.id", "=", "bonus.users_id")
            ->where("bonus.status", 0)
            ->orWhere("bonus.is_pay", 1)
            ->where("users.email", "like", '%' . Cookie::get('search_kyc') . '%')
            ->orderBy('users.id', 'desc')->paginate(15);
        }
        $data->setPath('transfer');
        $row = json_decode(json_encode([
            "title" => "Users KYC - Transfer",
        ]));
        return view("Dashboard::kyc.transfer", compact("row", "settings", "data"));
    }


    public function postIndex(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_kyc", $request->search, 60);
            return redirect()->route("admin.kyc")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function cancelBonus($bonus_id = 0, $airdrop_id = 0)
    {
        $airdrop = Airdrop_Model::find($airdrop_id);
        $airdrop->total = $airdrop->total + 1;
        $airdrop->save();
        Bonus_Model::find($bonus_id)->delete();
        return redirect()->route("admin.kyc")->with(["type" => "success", "flash_message" => "Bonus refunded!"]);
    }

    public function sendBonus($bonus_id = 0)
    {
        
        $bonus = Bonus_Model::find($bonus_id);
        $bonus->status = 0;
        $bonus->save();
        $wallet = Wallet_Model::where("users_id",$bonus->users_id)->first();
        //echo $wallet->address;
        Helper::api_post("/token/transferBonus", array("quantity" => 1, 
        "bonus_id" => $bonus_id,
        "address" => $wallet->address, 
        "secret_key" => "ngodinhluan"));
        return redirect()->route("admin.kyc")->with(["type" => "success", "flash_message" => "Bonus sent!"]);
    }

    public function edit($id = 0)
    {
        $settings = config('global.settings');
        $data = Users_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Users - Chi tiết",
            "desc" => "Chi tiết",
        ]));
        return view("Dashboard::users.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0)
    {
        $settings = config('global.settings');
        //$this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $users = Users_Model::find($id);
        $users->google2fa_enable = $request->google2fa_enable;
        $users->status = $request->status;
        $users->kyc_status = $request->kyc_status;
        if ($users->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function delete($id = "")
    {
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $users = Users_Model::find($list_id[0]->id);
            $users->status = 2; //2 is trash
            if ($users->save()) {
                return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $users = Users_Model::find($value->id);
                $users->status = 2; //2 is trash
                $users->save();
            }
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0)
    {
        $users = Users_Model::find($id);
        $users->status = $status;
        if ($users->save()) {
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash()
    {
        $data = Users_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - users",
        ]));
        return view("Dashboard::users.trash", compact("row", "data"));
    }

    public function trashDelete($id = "")
    {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Users_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/users/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/users/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Users_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
