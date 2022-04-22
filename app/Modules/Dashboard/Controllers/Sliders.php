<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Sliders_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Sliders extends Controller {

    public function __construct() {
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_sliders') == "") {
            // if cookie not existed
            $data = Sliders_Model::where("language_id",1)->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Sliders_Model::where("language_id",1)->where("title", "like", '%' . Cookie::get('search_sliders') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('sliders');
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
        ]));
        return view("Dashboard::sliders.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_sliders", $request->search, 60);
            return redirect()->route("admin.sliders")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function indexVi() {
        $data = null;
        if (Cookie::get('search_sliders') == "") {
            // if cookie not existed
            $data = Sliders_Model::where("language_id",2)->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Sliders_Model::where("language_id",2)->where("title", "like", '%' . Cookie::get('search_sliders') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('sliders');
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
        ]));
        return view("Dashboard::sliders.index", compact("row", "data"));
    }

    public function postIndexVi(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_sliders", $request->search, 60);
            return redirect()->route("admin.sliders")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        $list_sliders = Sliders_Model::orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::sliders.add", compact("row", "list_sliders", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required", "photo" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh"]);
        $sliders = new Sliders_Model;
        $sliders->language_id = $request->lang == "vi" ? 2 : 1;
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->status = $request->status;
        $sliders->sort = $request->sort;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_SLIDE"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/slide/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/slide/large", $file_name);
            //save database
            $sliders->image = $file_name;
        }
        if ($sliders->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Sliders_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Sliders - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::sliders.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề"]);

        $sliders = Sliders_Model::find($id);
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->status = $request->status;
        $sliders->sort = $request->sort;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/large/' . $sliders->image;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/thumb/' . $sliders->image;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_SLIDE"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/slide/thumb/' . $file_name);
            }

            $file->move("public/upload/images/slide/large", $file_name);
            $sliders->image = $file_name;
        }
        if ($sliders->save()) {
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
            $sliders = Sliders_Model::find($list_id[0]->id);
            $sliders->status = 2; //2 is trash
            if ($sliders->save()) {
                return back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $sliders = Sliders_Model::find($value->id);
                $sliders->status = 2; //2 is trash
                $sliders->save();
            }
            return redirect()->route("admin.sliders")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $sliders = Sliders_Model::find($id);
        $sliders->status = $status;
        if ($sliders->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Sliders_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Sliders",
        ]));
        return view("Dashboard::sliders.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Sliders_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/large/' . $data->image;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/slide/thumb/' . $data->image;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Sliders_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
