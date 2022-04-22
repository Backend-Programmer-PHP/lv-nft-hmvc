<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Order_Model;
//use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Order extends Controller {

    public function __construct() {
        
    }

    public function index() {
		$settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_order') == "") {
            // if cookie not existed
            $data = Order_Model::select("order.*","users.fullname","users.email","wallet.address")
                    ->leftJoin("users","users.id","=","order.users_id")
					->leftJoin("wallet","wallet.id","=","order.wallet_id")  
					->orderBy('order.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = Order_Model::select("order.*","users.fullname","users.email","wallet.address")
                    ->leftJoin("users","users.id","=","order.users_id")
					->leftJoin("wallet","wallet.id","=","order.wallet_id")
                    ->where("order.id", Cookie::get('search_order'))
                    ->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('orders');
        $row = json_decode(json_encode([
            "title" => "Orders",
        ]));
        return view("Dashboard::order.index", compact("row", "data","settings"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_order", $request->search, 60);
            return redirect()->route("admin.orders")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function edit($id = 0) {
        $settings = config('global.settings');        
        $data = Order_Model::select("order.*","users.fullname","users.email","wallet.address","rate.token as token_rate","rate.eth as eth_rate")
                    ->leftJoin("users","users.id","=","order.users_id")
					->leftJoin("wallet","wallet.id","=","order.wallet_id")
					->leftJoin("rate","rate.id","=","order.rate_id")
					->where("order.id",$id)
					->first();
        $row = json_decode(json_encode([
            "title" => "Order - Chi tiết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::order.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        $settings = config('global.settings');
        $this->validate($request, ["title" => "required"], ["title.required" => "Vui lòng nhập tiêu đề", "alias.required" => "Vui lòng nhập link"]);

        $blog = Order_Model::find($id);
        $blog->title = $request->title;
        if ($request->alias == "") {
            $blog->alias = Str::slug($request->title);
        } else {
            $blog->alias = $request->alias;
        }
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;

        $blog->blog_category_id = $request->blog_category_id;

        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;

        $blog->status = $request->status;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/large/' . $blog->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/thumb/' . $blog->photo;
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

                $image_resize->save('public/upload/images/blog/thumb/' . $file_name);
            }

            $file->move("public/upload/images/blog/large", $file_name);
            $blog->photo = $file_name;
        }
        if ($blog->save()) {
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
            $blog = Order_Model::find($list_id[0]->id);
            $blog->status = 2; //2 is trash
            if ($blog->save()) {
                return redirect()->route("admin.order")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $blog = Order_Model::find($value->id);
                $blog->status = 2; //2 is trash
                $blog->save();
            }
            return redirect()->route("admin.order")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function trash() {
        $data = Order_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Blog",
        ]));
        return view("Dashboard::order.trash", compact("row", "data"));
    }

    public function trashDelete($id = "") {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Order_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/large/' . $data->photo;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/blog/thumb/' . $data->photo;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Order_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
