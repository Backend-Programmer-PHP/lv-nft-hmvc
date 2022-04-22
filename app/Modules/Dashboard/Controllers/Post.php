<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Category_Model;
use App\Modules\Dashboard\Models\Post_Model;
use App\Modules\Dashboard\Models\PostImage_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class Post extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = null;
        if (Cookie::get('search_post') == "") {
            // if cookie not existed
            $category = Category_Model::where("language_id", 1)->orderBy('id', 'desc')->paginate(15);
            $data = Post_Model::select("post.*", "category.category_name")
                ->leftJoin("category","category.id","=","post.category_id")
                ->where("post.language_id", 1)
                ->whereIn("post.status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $category = Category_Model::where("language_id", 1)->orderBy('id', 'desc')->paginate(15);
            $data = Post_Model::select("post.*", "category.category_name")
            ->leftJoin("category","category.id","=","post.category_id")
            ->where("post.language_id", 1)
            ->whereIn("post.status", [0, 1])->where("post.title", "like", '%' . Cookie::get('search_post') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('en');
        $row = json_decode(json_encode([
            "title" => "Bài viết - En",
        ]));
        return view("Dashboard::post.index", compact("row", "data"));
    }

    public function postIndex(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_post", $request->search, 60);
            return redirect()->route("admin.post")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function indexVi()
    {
        $data = null;
        if (Cookie::get('search_post') == "") {
            // if cookie not existed
            $category = Category_Model::where("language_id", 2)->orderBy('id', 'desc')->paginate(15);
            $data = Post_Model::select("post.*", "category.category_name")
            ->leftJoin("category","category.id","=","post.category_id")
            ->where("post.language_id", 2)
            ->whereIn("post.status", [0, 1])->orderBy('id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $category = Category_Model::where("language_id", 2)->orderBy('id', 'desc')->paginate(15);
            $data = Post_Model::select("post.*", "category.category_name")
            ->leftJoin("category","category.id","=","post.category_id")
            ->where("post.language_id", 2)
            ->whereIn("post.status", [0, 1])->where("post.title", "like", '%' . Cookie::get('search_post') . '%')->orderBy('id', 'desc')->paginate(15);
        }
        $data->setPath('vi');
        $row = json_decode(json_encode([
            "title" => "Bài viết - Vi",
        ]));
        return view("Dashboard::post.index", compact("row", "data"));
    }

    public function postIndexVi(Request $request)
    {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_post", $request->search, 60);
            return redirect()->route("admin.category")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function add($lang = "")
    {
        $settings = config('global.settings');
        $list_category = Category_Model::where("language_id", $lang == "vi" ? 2 : 1)->orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Bài viết  - Thêm " . strtoupper($lang),
            "desc" => "Thêm mới",
        ]));
        return view("Dashboard::post.add", compact("row", "list_category", "settings"));
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
        $post = new Post_Model;
        $post->language_id = $request->lang == "vi" ? 2 : 1;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->title = $request->title;
        $post->address = $request->address;
        $post->day_working = $request->day_working;
        $post->time_working = $request->time_working;
        $post->website = $request->website;
        $post->content = $request->content;
        $post->district = $request->district;
        $post->image_count = 0;
        $post->star_review = $request->star_review;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_POST"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/post/thumb/' . $file_name);
            }
            // close upload image
            $file->move("public/upload/images/post/large", $file_name);
            //save database
            $post->image = $file_name;
        }
        if ($post->save()) {
            return redirect("/dashboard/post/photo/" . $post->id)->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function edit($id = 0)
    {
        $settings = config('global.settings');
        $list_category = Category_Model::select('id', 'category_name')->get();
        $data = Post_Model::find($id);
        $row = json_decode(json_encode([
            "title" => "Bài viết",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::post.edit", compact("row", "data", 'list_category', "settings"));
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

        $post = Post_Model::find($id);
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->title = $request->title;
        $post->address = $request->address;
        $post->day_working = $request->day_working;
        $post->time_working = $request->time_working;
        $post->website = $request->website;
        $post->content = $request->content;
        $post->district = $request->district;
        $post->image_count = 0;
        $post->star_review = $request->star_review;
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/post/large/' . $post->image;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/post/thumb/' . $post->image;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }

            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();

            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_POST"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/post/thumb/' . $file_name);
            }
            $file->move("public/upload/images/post/large", $file_name);
            $post->image = $file_name;
        }
        if ($post->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function photo($id = 0)
    {
        $settings = config('global.settings');
        //$list_category = Category_Model::where("language_id", $lang == "vi" ? 2 : 1)->orderBy('id', 'desc')->get();
        $post = Post_Model::find($id);
        $data = PostImage_Model::where("post_id", $id)->get();
        $row = json_decode(json_encode([
            "title" => "Hình ảnh - Bài viết",
            "desc" => "Hình ảnh bài viết: " . $post->title,
        ]));
        return view("Dashboard::post.photo", compact("row",  "settings", "post", "data"));
    }

    public function photoPost(Request $request)
    {
        $settings = config('global.settings');
        if (isset($_POST["addphoto"])) {
            $this->validate($request, ["photo" => "required"], ["photo.required" => "Vui lòng upload hình"]);
            $postImage = new PostImage_Model;
            if ($request->hasFile('photo')) {
                //delete if exist
                $image = str_replace("\\", "/", base_path()) . '/public/upload/images/post/large/' . $postImage->name;
                if (file_exists($image)) {
                    File::delete($image);
                }
                $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/post/thumb/' . $postImage->name;
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

                    $image_resize->save('public/upload/images/post/thumb/' . $file_name);
                }

                $file->move("public/upload/images/post/large", $file_name);
                $postImage->name = $file_name;
            }
            $postImage->post_id = $request->id;
            $postImage->status = 1;
            if ($postImage->save()) {
                return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        }
    }

    public function photoDelete($id = "")
    {
        $postImage = PostImage_Model::find($id);
        $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/post/large/' . $postImage->name;
        $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/post/thumb/' . $postImage->name;
        if (file_exists($image_large)) {
            File::delete($image_large);
        }
        if (file_exists($image_thumb)) {
            File::delete($image_thumb);
        }
        if ($postImage->delete()) {
            return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
        } else {
            return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
        }
    }

    public function photoStatus($id = 0, $status = 0)
    {
        $postImage = PostImage_Model::find($id);
        $postImage->status = $status;
        if ($postImage->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }


    public function delete($id = "")
    {
        $list_id = json_decode($id);
        if (!isset($list_id[0]->id)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu để xóa."]);
        }
        if (count($list_id) == 1 && isset($list_id[0]->id)) {
            $category = Post_Model::find($list_id[0]->id);
            $category->status = 2; //2 is trash
            if ($category->save()) {
                return back()->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
            }
        } else {
            foreach ($list_id as $key => $value) {
                $category = Post_Model::find($value->id);
                $category->status = 2; //2 is trash
                $category->save();
            }
            return redirect()->route("admin.post")->with(["type" => "success", "flash_message" => "Đã di chuyển vào thùng rác!"]);
        }
    }

    public function status($id = 0, $status = 0)
    {
        //echo $status;
        $category = Post_Model::find($id);
        $category->status = $status;
        if ($category->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function trash()
    {
        $data = Post_Model::where("status", 2)->orderBy('id', 'desc')->paginate(15);
        $data->setPath('trash');
        $row = json_decode(json_encode([
            "title" => "Thùng rác - Bài viết",
        ]));
        return view("Dashboard::post.trash", compact("row", "data"));
    }

    public function trashDelete($id = "")
    {
        //delete image first
        $list_id = json_decode($id);
        //xoa mot
        if (count($list_id) == 1) {
            $data = Post_Model::where("id", $list_id[0]->id)->first();
            $image_large = str_replace("\\", "/", base_path()) . '/public/upload/images/post/large/' . $data->image;
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/post/thumb/' . $data->image;
            if (file_exists($image_large)) {
                File::delete($image_large);
            }
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $slide = Post_Model::find($list_id[0]->id);
            if ($slide->delete()) {
                return back()->with(["type" => "success", "flash_message" => "Xóa thành công!"]);
            } else {
                return back()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được xóa!"]);
            }
        }
    }
}
