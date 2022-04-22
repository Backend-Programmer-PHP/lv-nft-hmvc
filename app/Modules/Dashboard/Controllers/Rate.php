<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Rate_Model;
use App\Modules\Dashboard\Models\Phase_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Rate extends Controller {

    public function __construct() {
        
    }

    public function index() {
		$settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_rate') == "") {
            // if cookie not existed
            $data = Rate_Model::select("rate.*","phase.name")
			->leftJoin("phase","phase.id","=","rate.phase_id")
			->whereIn("rate.status",[0,1])
			->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Rate_Model::where("title", "like", '%' . Cookie::get('search_rate') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('rate');
        $row = json_decode(json_encode([
            "title" => "Rate - Danh sách",
        ]));
        return view("Dashboard::rate.index", compact("row", "data","settings"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_rate", $request->search, 60);
            return redirect()->route("admin.rate")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Rate - Tỉ giá",
            "desc" => "Thêm mới",
        ]));
		$phase = Phase_Model::all();
        return view("Dashboard::rate.add", compact("row", "phase", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["eth" => "required","token" => "required"], ["eth.required" => "Vui lòng nhập số ETH", "token.required" => "Vui lòng nhập số token".$settings['ICO_SYMBOL']]);
		$rate = new Rate_Model;
        $rate->phase_id = $request->phase_id;
        $rate->bnb = $request->bnb;
		$rate->token = $request->token;


        $rate->status = $request->status;
        
        if ($rate->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $phase = Phase_Model::all();
        $data = Rate_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Rate - tỉ giá",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::rate.edit", compact("row", "data",  "settings","phase"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["bnb" => "required","token" => "required"], ["eth.required" => "Vui lòng nhập số BNB", "token.required" => "Vui lòng nhập số token".$settings['ICO_SYMBOL']]);

        $rate = Rate_Model::find($id);
        
        $rate->phase_id = $request->phase_id;
        $rate->bnb = $request->bnb;
		$rate->token = $request->token;
        
        $rate->status = $request->status;
        
        if ($rate->save()) {
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
            $rate = Rate_Model::find($list_id[0]->id);
            $rate->status = 2; //2 is trash
            if ($rate->save()) {
                return redirect()->route("admin.rate")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $rate = Rate_Model::find($value->id);
                $rate->status = 2; //2 is trash
                $rate->save();
            }
            return redirect()->route("admin.rate")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $rate = Rate_Model::find($id);
        $rate->status = $status;
        if ($rate->save()) {
            return redirect()->route("admin.rate")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
		$settings = config('global.settings');
        $data = Rate_Model::select("rate.*","phase.name")
			->leftJoin("phase","phase.id","=","rate.phase_id")
			->where("rate.status",2)
			->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Rate",
        ]));
        return view("Dashboard::rate.trash", compact("row", "data","settings"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Rate_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/rate/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/rate/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Rate_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
