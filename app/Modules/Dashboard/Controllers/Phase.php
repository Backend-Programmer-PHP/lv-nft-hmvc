<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Phase_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Phase extends Controller {

    public function __construct() {
       
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_phase') == "") {
            // if cookie not existed
            $data = Phase_Model::whereIn("status",[0,1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Phase_Model::where("title", "like", '%' . Cookie::get('search_phase') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('phase');
        $row = json_decode(json_encode([
            "title" => "Phase - Giai đoạn",
        ]));
        return view("Dashboard::phase.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_phase", $request->search, 60);
            return redirect()->route("admin.phase")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Phase - Giai đoạn",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::phase.add", compact("row", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, 
			["name" => "required","start_date" => "required","end_date" => "required","token_number" => "required","token_remaining" => "required","limit_buy_token" => "required"], 
			["name.required" => "Vui lòng nhập name", "start_date.required" => "Vui lòng nhập ngày", 
			"token_number.required" => "Vui lòng nhập Token number", 
			"token_remaining.required" => "Vui lòng nhập Token remaining",
			"limit_buy_token.required" => "Vui lòng nhập limit buy token"]);
        $phase = new Phase_Model;
        $phase->name = $request->name;
        $phase->start_date = $request->start_date;
        $phase->end_date = $request->end_date;
		$phase->token_number = $request->token_number;
		$phase->token_remaining = $request->token_remaining;
		$phase->limit_buy_token = $request->limit_buy_token;
        $phase->price = $request->price;
        $phase->status = $request->status;
        if ($phase->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Phase_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Phase - Giai đoạn",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::phase.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, 
			["name" => "required","start_date" => "required","end_date" => "required","token_number" => "required","token_remaining" => "required","limit_buy_token" => "required"], 
			["name.required" => "Vui lòng nhập name", "start_date.required" => "Vui lòng nhập ngày", 
			"token_number.required" => "Vui lòng nhập Token number", 
			"token_remaining.required" => "Vui lòng nhập Token remaining",
			"limit_buy_token.required" => "Vui lòng nhập limit buy token"]);
        $phase = Phase_Model::find($id);
        $phase->name = $request->name;
        $phase->start_date = $request->start_date;
        $phase->end_date = $request->end_date;
		$phase->token_number = $request->token_number;
		$phase->token_remaining = $request->token_remaining;
		$phase->limit_buy_token = $request->limit_buy_token;
        $phase->price = $request->price;
        $phase->status = $request->status;
        if ($phase->save()) {
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
            $phase = Phase_Model::find($list_id[0]->id);
            $phase->status = 2; //2 is trash
            if ($phase->save()) {
                return redirect()->route("admin.phase")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác 1 rows!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $phase = Phase_Model::find($value->id);
                $phase->status = 2; //2 is trash
                $phase->save();
            }
            return redirect()->route("admin.phase")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $phase = Phase_Model::find($id);
        $phase->status = $status;
        if ($phase->save()) {
            return redirect()->route("admin.phase")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Phase_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Phase",
        ]));
        return view("Dashboard::phase.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Phase_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/phase/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/phase/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Phase_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
