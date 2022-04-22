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
use App\Modules\Dashboard\Models\TransactionsSmartcontact_Model;

class SmartContract extends Controller {

    public function __construct() {

    }

    public function index() {   
        $settings = config('global.settings');     
        $frozen = Helper::api_get("/token/frozen")->isTrozen;
        $row = json_decode(json_encode([
            "title" => "Smart Contract - Thông Tin",
        ]));
        return view("Dashboard::smartcontract.index", compact("row","settings","frozen"));
    }

    public function frozen() {   
        $settings = config('global.settings');     
        $frozen = Helper::api_get("/token/frozen")->isTrozen;
        $row = json_decode(json_encode([
            "title" => "Smart Contract - Đóng băng",
            "desc" => "Đóng băng",
        ]));
        return view("Dashboard::smartcontract.frozen", compact("row","settings","frozen"));
    }

    public function frozenPost(Request $request) {
        //echo ($request->frozen?1:0);
        $frozen = Helper::api_get("/token/set-frozen?status=".$request->frozen);        
        $transactions = new TransactionsSmartcontact_Model;
        $transactions->hash = $frozen->hash;
        $transactions->status = $frozen->status? 1 : 0;
        $transactions->save();
        
        return back()->with(["type" => "success", "flash_message" => "Xử lý thành công!"]);
    }

    public function transaction() {
        $settings = config('global.settings');
        $data = TransactionsSmartcontact_Model::orderBy('id', 'desc')->paginate(15);
        $row = json_decode(json_encode([
            "title" => "Smart Contract - Transaction",
            "desc" => "Lịch sử giao dịch",
        ]));
        return view("Dashboard::smartcontract.transaction", compact("row", "settings","data"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required", "photo" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh", "content.required" => "Vui lòng nhập nội dung"]);
        $users = new Users_Model;
        $users->title = $request->title;
        if ($users->alias == '') {
            $users->alias = Str::slug($request->title);
        } else {
            $users->alias = $request->alias;
        }
        $users->excerpt = $request->excerpt;
        $users->content = $request->content;
        $users->status = $request->status;
        $users->users_category_id = $request->users_category_id;

        $users->meta_title = $request->meta_title;
        $users->meta_keyword = $request->meta_keyword;
        $users->meta_description = $request->meta_description;

        $users->status = $request->status;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_users"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/users/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/users/large", $file_name);
            //save database
            $users->photo = $file_name;
        }
        if ($users->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $data = Users_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "users - Danh sách",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::users.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $users = Users_Model::find($id);
        $users->title = $request->title;
        if ($request->alias == "") {
            $users->alias = Str::slug($request->title);
        } else {
            $users->alias = $request->alias;
        }
        $users->excerpt = $request->excerpt;
        $users->content = $request->content;

        $users->users_category_id = $request->users_category_id;

        $users->meta_title = $request->meta_title;
        $users->meta_keyword = $request->meta_keyword;
        $users->meta_description = $request->meta_description;

        $users->status = $request->status;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/users/large/' . $users->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/users/thumb/' . $users->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());

                $thumb_size = json_decode($settings["THUMB_SIZE_users"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);

                $image_resize->save('public/upload/images/users/thumb/' . $file_name);
            }

            $file->move("public/upload/images/users/large", $file_name);
            $users->photo = $file_name;
        }
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
