<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Users_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Users extends Controller {

    public function __construct() {       
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_users') == "") {
            // if cookie not existed
            $data = Users_Model::select("users.*","wallet.address")->leftJoin("wallet","users.id","=","wallet.users_id")->orderBy('users.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Users_Model::select("users.*","wallet.address")->leftJoin("wallet","users.id","=","wallet.users_id")->where("users.email", "like", '%' . Cookie::get('search_users') . '%')->orderBy('users.id', 'desc')->paginate(15);
        }
        $data->setPath('users');
        $row = json_decode(json_encode([
            "title" => "Users - Danh sách",
        ]));
        return view("Dashboard::users.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_users", $request->search, 60);
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    
    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Users_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Users - Chi tiết",
            "desc" => "Chi tiết",
        ]));
        return view("Dashboard::users.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
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

    public function delete($id = "") {
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

    public function status($id = 0, $status = 0) {
        $users = Users_Model::find($id);
        $users->status = $status;
        if ($users->save()) {
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Users_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - users",
        ]));
        return view("Dashboard::users.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
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
