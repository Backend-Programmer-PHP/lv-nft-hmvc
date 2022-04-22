<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Category_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Category extends Controller {

    public function __construct() {
    }

    public function index() {
        $data = null;
        if (Cookie::get('search_category') == "") {
            // if cookie not existed
            $data = Category_Model::where("language_id",1)->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Category_Model::where("language_id",1)->where("title", "like", '%' . Cookie::get('search_category') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('category');
        $row = json_decode(json_encode([
            "title" => "Category - Bài viết",
        ]));
        return view("Dashboard::category.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_category", $request->search, 60);
            return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function indexVi() {
        $data = null;
        if (Cookie::get('search_category') == "") {
            // if cookie not existed
            $data = Category_Model::where("language_id",2)->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Category_Model::where("language_id",2)->where("title", "like", '%' . Cookie::get('search_category') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('category');
        $row = json_decode(json_encode([
            "title" => "Category - Bài viết",
        ]));
        return view("Dashboard::category.index", compact("row", "data"));
    }

    public function postIndexVi(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_category", $request->search, 60);
            return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        $list_category = Category_Model::orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Category - Bài viết",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::category.add", compact("row", "list_category", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["category_name" => "required", "photo" => "required"], ["category_name.required" => "Vui lòng nhập tên category", "photo.required" => "Vui lòng chọn hình ảnh"]);
        $category = new Category_Model;
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->sort = $request->sort;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_BLOG"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/category/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/category/large", $file_name);
            //save database
            $category->imageUri = $file_name;
        }
        if ($category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $data_all = Category_Model::select('id','category_name')->get();
        $data = Category_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Category - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::category.edit", compact("row", "data",'data_all', "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["category_name" => "required"], ["category_name.required" => "Vui lòng nhập category"]);

        $category = Category_Model::find($id);
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->sort = $request->sort;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/category/large/' . $category->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/category/thumb/' . $category->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_BLOG"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/category/thumb/' . $file_name);
            }

            $file->move("public/upload/images/category/large", $file_name);
            $category->imageUri = $file_name;
        }
        if ($category->save()) {
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
            $category = Category_Model::find($list_id[0]->id);
            $category->status = 2; //2 is trash
            if ($category->save()) {
                return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $category = Category_Model::find($value->id);
                $category->status = 2; //2 is trash
                $category->save();
            }
            return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $category = Category_Model::find($id);
        $category->status = $status;
        if ($category->save()) {
            return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Category_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Category",
        ]));
        return view("Dashboard::category.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Category_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/category/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/category/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Category_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
