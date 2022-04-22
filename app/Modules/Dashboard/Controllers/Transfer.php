<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Transfer_Model;
use App\Modules\Dashboard\Models\TransferTransactions_Model;
use App\Modules\Dashboard\Models\Wallet_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Transfer extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_transfer') == "") {
            // if cookie not existed
            $data = Wallet_Model::select("wallet.*", "users.email")
                ->leftJoin("users", "users.id", "=", "wallet.users_id")
                ->whereIn("wallet.status", [0, 1])
                ->where("token_quantity", ">", 0)
                ->where("wallet.is_transfer", null)
                ->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Wallet_Model::where("address", "like", '%' . Cookie::get('search_wallet') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('transfer');
        $row = json_decode(json_encode([
            "title" => "Transfer - Danh sách trả token",
        ]));
        return view("Dashboard::transfer.index", compact("row", "data","settings"));
    }

    public function postIndex(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_transfer", $request->search, 60);
            return redirect()->route("admin.transfer")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function send($id = "")
    {
        $settings = config('global.settings');
        $data = Wallet_Model::where("id", $id)->where("token_quantity", ">", 0)->first();
        if (!empty($data)) {
            $token_transfer = Helper::api_get("/token/transfer?address=" . $data->address . "&quantity=" . $data->token_quantity);
            if($token_transfer->status){
                $hash = json_decode($token_transfer->hash);
                if ($hash->status) {
                    $transfer = new Transfer_Model;
                    $transfer->users_id = $data->users_id;
                    $transfer->wallet_id = $data->id;
                    $transfer->address = $data->address;
                    $transfer->token_number = $data->token_quantity;
                    $transfer->hash = $token_transfer->hash;
                    $transfer->status=1;
                    $transfer->save();
                    $data->is_transfer=1;
                    $data->save();
                    return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
                } else {
                    return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
                }
            }else{
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        }
    }

    public function list()
    {
        $settings = config('global.settings');
        /*$data = Wallet_Model::select("wallet.*", "users.email")
                ->leftJoin("users", "users.id", "=", "wallet.users_id")
                ->whereIn("wallet.status", [0, 1])
                ->where("token_quantity", ">", 0)
                ->where("wallet.is_transfer", null)
        */
        $data = Transfer_Model::select("transfer.*", "users.email")
                ->leftJoin("users", "users.id", "=", "transfer.users_id")
                ->orderBy('id', 'desc')->paginate(15);
        $row = json_decode(json_encode([
            "title" => "Transfer - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        $data->setPath('list');
        return view("Dashboard::transfer.list", compact("row", "data",  "settings"));
    }

    
    public function delete($id = "")
    {
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $transfer = Transfer_Model::find($list_id[0]->id);
            $transfer->status = 2; //2 is trash
            if ($transfer->save()) {
                return redirect()->route("admin.transfer")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $transfer = Transfer_Model::find($value->id);
                $transfer->status = 2; //2 is trash
                $transfer->save();
            }
            return redirect()->route("admin.transfer")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0)
    {
        $transfer = Transfer_Model::find($id);
        $transfer->status = $status;
        if ($transfer->save()) {
            return redirect()->route("admin.transfer")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash()
    {
        $data = Transfer_Model::select("transfer.*", "users.email")
            ->leftJoin("users", "users.id", "=", "transfer.users_id")
            ->where("transfer.status", 2)
            ->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Transfer",
        ]));
        return view("Dashboard::transfer.trash", compact("row", "data"));
    }

    public function trashDelete($id = "")
    {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Transfer_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/transfer/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/transfer/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Transfer_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
