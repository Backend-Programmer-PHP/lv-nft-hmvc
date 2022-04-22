<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Maintain_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Maintain extends Controller {

    public function __construct() {       
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_maintain') == "") {
            // if cookie not existed
            $data = Maintain_Model::select("maintain.*","users.email","users.fullname")->leftJoin("users","users.id","=","maintain.users_id")->orderBy('users.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Maintain_Model::select("maintain.*","users.email","users.fullname")->leftJoin("users","users.id","=","maintain.users_id")->where("users.fullname", "like", '%' . Cookie::get('search_maintain') . '%')->orderBy('users.id', 'desc')->paginate(15);
        }
        $data->setPath('maintain');
        $row = json_decode(json_encode([
            "title" => "Maintain - Users allow access",
        ]));
        return view("Dashboard::maintain.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_maintain", $request->search, 60);
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    
    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Maintain_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Users - Chi tiết",
            "desc" => "Chi tiết",
        ]));
        return view("Dashboard::users.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        //$this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $users = Maintain_Model::find($id);
        $users->google2fa_enable = $request->google2fa_enable;    
        $users->status = $request->status;
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
            $users = Maintain_Model::find($list_id[0]->id);
            $users->status = 2; //2 is trash
            if ($users->save()) {
                return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $users = Maintain_Model::find($value->id);
                $users->status = 2; //2 is trash
                $users->save();
            }
            return redirect()->route("admin.users")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $users = Maintain_Model::find($id);
        $users->status = $status;
        if ($users->save()) {
            return redirect()->route("admin.maintain")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Maintain_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
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
            $data = Maintain_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/users/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/users/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Maintain_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}