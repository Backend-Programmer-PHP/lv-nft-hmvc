<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Category_Model;
use App\Modules\Dashboard\Models\PostImage_Model;
use App\Modules\Dashboard\Models\Post_Model;
use App\Modules\Dashboard\Models\TopPopular_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class TopPopular extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = TopPopular_Model::select("post.title","post.image","top_popular.*","category.category_name")
        ->leftJoin("post","post.id","=","top_popular.post_id")
        ->leftJoin("category","category.id","=","post.category_id")
        ->where("top_popular.language_id", 1)
        ->whereIn("top_popular.status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        $data->setPath('en');
        $row = json_decode(json_encode([
            "title" => "Top Place - En",
        ]));
        return view("Dashboard::toppopular.index", compact("row","data"));
    }

    public function postIndex(Request $request)
    {
    }

    public function indexVi()
    {

        $data = TopPopular_Model::select("post.title","post.image","top_popular.*","category.category_name")
        ->leftJoin("post","post.id","=","top_popular.post_id")
        ->leftJoin("category","category.id","=","post.category_id")
        ->where("top_popular.language_id", 2)
        ->whereIn("top_popular.status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        $data->setPath('vi');
        $row = json_decode(json_encode([
            "title" => "Bài viết - Vi",
        ]));
        return view("Dashboard::toppopular.index", compact("row", "data"));
    }

    public function postIndexVi(Request $request)
    {
        
    }

    public function add($lang = "")
    {
        $settings = config('global.settings');
        $lang == "vi" ? 2 : 1;
        $post = Post_Model::select("id","title")->where("language_id",($lang == "vi") ? 2 : 1)->where("status",1)->get();
        $row = json_decode(json_encode([
            "title" => "Top Place  - Thêm " . strtoupper($lang),
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::toppopular.add", compact("row","post","settings"));
    }

    public function postAdd(Request $request)
    {
        //echo $request->lang;
        $settings = config('global.settings');
        $this->validate(
            $request,
            ["post_id" => "required"],
            ["post_id.required" => "Vui lòng chọn bài viết"]
        );
        $post = new TopPopular_Model;
        $post->language_id = $request->lang == "vi" ? 2 : 1;
        $post->post_id = $request->post_id;
        $post->status = $request->status;
        if ($post->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0)
    {
        $settings = config('global.settings');
        $data = TopPopular_Model::find($id);
        $post = Post_Model::select("id","title")->where("language_id",$data->language_id)->where("status",1)->get();
        $row = json_decode(json_encode([
            "title" => "Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::toppopular.edit", compact("row", "data", "post" ,"settings"));
    }

    public function postEdit(Request $request, $id = 0)
    {
        $settings = config('global.settings');
        $this->validate(
            $request,
            ["post_id" => "required"],
            [
                "post_id.required" => "Vui lòng chọn bài viết",
            ]
        );

        $post = TopPopular_Model::find($id);
        $post->post_id = $request->post_id;
        $post->status = $request->status;
        if ($post->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function delete($id = "")
    {
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $category = TopPopular_Model::find($list_id[0]->id);
            $category->status = 2; //2 is trash
            if ($category->save()) {
                return back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $category = TopPopular_Model::find($value->id);
                $category->status = 2; //2 is trash
                $category->save();
            }
            return redirect()->route("admin.post")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0)
    {
        //echo $status;
        $category = TopPopular_Model::find($id);
        $category->status = $status;
        if ($category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash()
    {
        $data = TopPopular_Model::select("post.title","post.image","top_popular.*")
        ->leftJoin("post","post.id","=","top_popular.post_id")->where("top_popular.status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Top Popular",
        ]));
        return view("Dashboard::toppopular.trash", compact("row", "data"));
    }

    public function trashDelete($id = "")
    {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $slide = TopPopular_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
