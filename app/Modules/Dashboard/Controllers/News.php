<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Category_Model;
use App\Modules\Dashboard\Models\News_Model;
use App\Modules\Dashboard\Models\PostImage_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class News extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = null;
        if (Cookie::get('search_news') == "") {
            // if cookie not existed
            $data = News_Model::where("language_id", 1)
                ->whereIn("status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = News_Model::where("language_id", 1)
            ->whereIn("status", [0, 1])->where("title", "like", '%' . Cookie::get('search_news') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('en');
        $row = json_decode(json_encode([
            "title" => "Tin tức - En",
        ]));
        return view("Dashboard::news.index", compact("row", "data"));
    }

    public function postIndex(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_news", $request->search, 60);
            return redirect()->route("admin.news")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function indexVi()
    {
        $data = null;
        if (Cookie::get('search_news') == "") {
            // if cookie not existed
            $data = News_Model::where("language_id", 2)->whereIn("status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = News_Model::where("post.language_id", 2)
            ->whereIn("status", [0, 1])->where("post.title", "like", '%' . Cookie::get('search_news') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('vi');
        $row = json_decode(json_encode([
            "title" => "Tin tức - Vi",
        ]));
        return view("Dashboard::news.index", compact("row", "data"));
    }

    public function postIndexVi(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_news", $request->search, 60);
            return redirect()->route("admin.news")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add($lang = "")
    {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Tin tức  - Thêm " . strtoupper($lang),
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::news.add", compact("row", "settings"));
    }

    public function postAdd(Request $request)
    {
        //echo $request->lang;
        $settings = config('global.settings');
        $this->validate(
            $request,
            ["title" => "required", "photo" => "required", "content" => "required"],
            ["title.required" => "Vui lòng nhập tiêu đề", "photo.required" => "Vui lòng chọn hình ảnh", "content.required" => "Vui lòng nhập nội dung",]
        );
        $news = new News_Model;
        $news->language_id = $request->lang == "vi" ? 2 : 1;
        $news->status = $request->status;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image_count = 0;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_NEWS"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/news/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/news/large", $file_name);
            //save database
            $news->image = $file_name;
        }
        if ($news->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0)
    {
        $settings = config('global.settings');
        $data = News_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Tin tức",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::news.edit", compact("row", "data", "settings"));
    }

    public function postEdit(Request $request, $id = 0)
    {
        $settings = config('global.settings');
        $this->validate(
            $request,
            ["title" => "required", "content" => "required"],
            [
                "title.required" => "Vui lòng nhập tiêu đề",
                "content.required" => "Vui lòng nhập nội dung"
            ]
        );

        $news = News_Model::find($id);
        $news->status = $request->status;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image_count = 0;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/news/large/' . $news->image;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/news/thumb/' . $news->image;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_NEWS"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/news/thumb/' . $file_name);
            }
            $file->move("public/upload/images/news/large", $file_name);
            $news->image = $file_name;
        }
        if ($news->save()) {
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
            $category = News_Model::find($list_id[0]->id);
            $category->status = 2; //2 is trash
            if ($category->save()) {
                return back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $category = News_Model::find($value->id);
                $category->status = 2; //2 is trash
                $category->save();
            }
            return redirect()->route("admin.news")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0)
    {
        //echo $status;
        $category = News_Model::find($id);
        $category->status = $status;
        if ($category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash()
    {
        $data = News_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Bài viết",
        ]));
        return view("Dashboard::news.trash", compact("row", "data"));
    }

    public function trashDelete($id = "")
    {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = News_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/news/large/' . $data->image;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/news/thumb/' . $data->image;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = News_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
