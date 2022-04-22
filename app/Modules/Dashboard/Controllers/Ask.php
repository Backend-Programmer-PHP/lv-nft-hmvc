<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Ask_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Ask extends Controller {

    public function __construct() {
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_ask') == "") {
            // if cookie not existed
            $data = Ask_Model::whereIn("status",[0,1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Ask_Model::whereIn("status",[0,1])->where("message", "like", '%' . Cookie::get('search_ask') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('ask');
        $row = json_decode(json_encode([
            "title" => "Ask - Bài viết",
        ]));
        return view("Dashboard::ask.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_ask", $request->search, 60);
            return redirect()->route("admin.ask")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::ask.add", compact("row", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh"]);
        $ask = new Ask_Model;
        $ask->language_id = $request->lang == "vi" ? 2 : 1;
        $ask->title = $request->title;
        $ask->content = $request->content;
        $ask->status = $request->status;
        if ($ask->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Ask_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::ask.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề"]);

        $ask = Ask_Model::find($id);
        $ask->title = $request->title;
        $ask->content = $request->content;
        $ask->status = $request->status;
        if ($ask->save()) {
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
            $ask = Ask_Model::find($list_id[0]->id);
            $ask->status = 2; //2 is trash
            if ($ask->save()) {
                return back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $ask = Ask_Model::find($value->id);
                $ask->status = 2; //2 is trash
                $ask->save();
            }
            return redirect()->route("admin.ask")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $ask = Ask_Model::find($id);
        $ask->status = $status;
        if ($ask->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Ask_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Sliders",
        ]));
        return view("Dashboard::ask.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Ask_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/large/' . $data->image;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/thumb/' . $data->image;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Ask_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
