<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Wallet_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Wallet extends Controller {

    public function __construct() {
    }

    public function index() {
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_wallet') == "") {
            // if cookie not existed
            $data = Wallet_Model::select("wallet.*","users.email")
            ->leftJoin("users","users.id","=","wallet.users_id")
            ->whereIn("wallet.status",[0,1])
            ->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Wallet_Model::where("address", "like", '%' . Cookie::get('search_wallet') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('wallet');
        $row = json_decode(json_encode([
            "title" => "Wallet - Danh sách",
        ]));
        return view("Dashboard::wallet.index", compact("row", "data","settings"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_wallet", $request->search, 60);
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add() {
        $settings = config('global.settings');
        $list_category = WalletCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Wallet - Bài viết",
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::wallet.add", compact("row", "list_category", "settings"));
    }

    public function postAdd(Request $request) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required", "photo" => "required", "content" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh", "content.required" => "Vui lòng nhập nội dung"]);
        $wallet = new Wallet_Model;
        $wallet->title = $request->title;
        if ($wallet->alias == '') {
            $wallet->alias = Str::slug($request->title);
        } else {
            $wallet->alias = $request->alias;
        }
        $wallet->excerpt = $request->excerpt;
        $wallet->content = $request->content;
        $wallet->status = $request->status;
        $wallet->wallet_category_id = $request->wallet_category_id;

        $wallet->meta_title = $request->meta_title;
        $wallet->meta_keyword = $request->meta_keyword;
        $wallet->meta_description = $request->meta_description;

        $wallet->status = $request->status;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_BLOG"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/wallet/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/wallet/large", $file_name);
            //save database
            $wallet->photo = $file_name;
        }
        if ($wallet->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');
        $list_category = WalletCategory_Model::whereIn("status", [0, 1])->orderBy('id', 'desc')->get();
        $data = Wallet_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Wallet - Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::wallet.edit", compact("row", "data", "list_category", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $wallet = Wallet_Model::find($id);
        $wallet->title = $request->title;
        if ($request->alias == "") {
            $wallet->alias = Str::slug($request->title);
        } else {
            $wallet->alias = $request->alias;
        }
        $wallet->excerpt = $request->excerpt;
        $wallet->content = $request->content;

        $wallet->wallet_category_id = $request->wallet_category_id;

        $wallet->meta_title = $request->meta_title;
        $wallet->meta_keyword = $request->meta_keyword;
        $wallet->meta_description = $request->meta_description;

        $wallet->status = $request->status;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/wallet/large/' . $wallet->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/wallet/thumb/' . $wallet->photo;
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

                $image_resize->save('public/upload/images/wallet/thumb/' . $file_name);
            }

            $file->move("public/upload/images/wallet/large", $file_name);
            $wallet->photo = $file_name;
        }
        if ($wallet->save()) {
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
            $wallet = Wallet_Model::find($list_id[0]->id);
            $wallet->status = 2; //2 is trash
            if ($wallet->save()) {
                return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $wallet = Wallet_Model::find($value->id);
                $wallet->status = 2; //2 is trash
                $wallet->save();
            }
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0) {
        $wallet = Wallet_Model::find($id);
        $wallet->status = $status;
        if ($wallet->save()) {
            return redirect()->route("admin.wallet")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }
    
    public function trash() {
        $data = Wallet_Model::select("wallet.*","users.email")
        ->leftJoin("users","users.id","=","wallet.users_id")
        ->where("wallet.status",2)
        ->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Wallet",
        ]));
        return view("Dashboard::wallet.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Wallet_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/wallet/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/wallet/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Wallet_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
