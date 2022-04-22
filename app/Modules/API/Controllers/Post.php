<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Category_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Models\Post_Model;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Models\PostImage_Model;
use App\Modules\API\Models\TopPlace_Model;
use App\Modules\API\Models\TopPopular_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Post extends Controller
{
    public function index(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        /*$category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->where("parent_id", empty($request->parent_id) ? 0 : $request->parent_id)
            ->orderBy("sort", "asc")
            ->get();*/
        if (!empty($request->email)) {
            $users = Users_Model::select('id')->where("email", $request->email)->first();

            $post = null;
            if (empty($users)) {
                $post = Post_Model::select("post.*", "category.category_name")
                    ->leftJoin('category', "category.id", "=", "post.category_id")
                    ->where("post.language_id", $language->id)
                    ->where("post.category_id", $request->category_id)
                    ->where("post.status", 1)
                    ->get();
            } else {
                $post = Post_Model::select(
                    "post.*",
                    "category.category_name",
                    'post_like.like_post as like_post',
                    'post_like.users_id'
                )
                    ->leftJoin('category', "category.id", "=", "post.category_id")
                    ->leftJoin('post_like', "post_like.post_id", "=", "post.id")
                    ->where("post_like.users_id", $users->id)
                    ->where("post.language_id", $language->id)
                    ->where("post.category_id", $request->category_id)
                    ->where("post.status", 1)
                    ->get();
            }
            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "like_post" => $value->like_post ? true : false,
                    "users_id" => $value->users_id,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        } else {
            $post = Post_Model::select("post.*", "category.category_name")
                ->leftJoin('category', "category.id", "=", "post.category_id")
                ->where("post.language_id", $language->id)
                ->where("post.category_id", $request->category_id)
                ->where("post.status", 1)
                ->get();

            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        }
    }

    public function allpost()
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        $post = Post_Model::select("post.*", "category.category_name")
            ->leftJoin('category', "category.id", "=", "post.category_id")
            ->where("post.language_id", $language->id)
            ->where("post.status", 1)
            ->orderBy("id","desc")
            ->get();
        $data = array();
        foreach ($post as $value) {
            array_push($data, [
                "id" => $value->id,
                "title" => $value->title,
                "category_name" => $value->category_name,
                "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                "start_count" => $value->star_review
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }


    public function detail(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();

        $post = Post_Model::select("post.*", "category.category_name")
            ->leftJoin('category', "category.id", "=", "post.category_id")
            ->where("post.status", 1)
            ->where("post.id", $request->id)
            ->first();

        $data = array();
        $listImage = [];
        $postImage = PostImage_Model::select("name", "id")->where("post_id", $post->id)->where("status", 1)->get();
        foreach ($postImage as $key => $value) {
            array_push($listImage, [
                'imageUri' => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->name,
                'id' => $value->id
            ]);
        }
        array_push($data, [
            "id" => $post->id,
            "title" => $post->title,
            "category_name" => $post->category_name,
            "address" => $post->address,
            "date_working" => $post->date_working,
            "time_working" => $post->time_working,
            "website" => $post->website,
            "content" => htmlspecialchars_decode($post->content,ENT_QUOTES),
            "district" => $post->district,
            "star_review" => $post->star_review,
            "image" => $listImage
        ]);
        //"image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $post->image


        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }

    public function topplaces(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        /*$category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->where("parent_id", empty($request->parent_id) ? 0 : $request->parent_id)
            ->orderBy("sort", "asc")
            ->get();*/
        $id = $language->id == 1 ? 15 : 16;
        if (!empty($request->email)) {
            $users = Users_Model::select('id')->where("email", $request->email)->first();

            $post = null;
            if (empty($users)) {
                $post = TopPlace_Model::select("post.*", "category.category_name")
                    ->leftJoin('post', "post.id", "=", "top_place.post_id")
                    ->where("post.language_id", $language->id)
                    ->where("post.status", 1)
                    ->where("top_place.status", 1)
                    ->limit(!empty($request->limit) ? $request->limit : 20)
                    ->get();
            } else {
                $post = TopPlace_Model::select(
                    "post.*",
                    'post_like.like_post as like_post',
                    'post_like.users_id'
                )
                    ->leftJoin('post', "post.id", "=", "top_place.post_id")
                    ->leftJoin('post_like', "post_like.post_id", "=", "post.id")
                    ->where("post_like.users_id", $users->id)
                    ->where("post.language_id", $language->id)
                    ->where("post.status", 1)
                    ->where("top_place.status", 1)
                    ->limit(!empty($request->limit) ? $request->limit : 20)
                    ->get();
            }
            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "like_post" => $value->like_post ? true : false,
                    "users_id" => $value->users_id,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        } else {
            $post = TopPlace_Model::select("post.*")
            ->leftJoin('post', "post.id", "=", "top_place.post_id")
                ->where("post.language_id", $language->id)
                ->where("post.status", 1)
                ->where("top_place.status", 1)
                ->limit(!empty($request->limit) ? $request->limit : 20)
                ->get();
            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        }
    }
    public function toppopular(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        /*$category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->where("parent_id", empty($request->parent_id) ? 0 : $request->parent_id)
            ->orderBy("sort", "asc")
            ->get();*/
        $id = ($language->id == 1) ? 17 : 18;
        if (!empty($request->email)) {
            $users = Users_Model::select('id')->where("email", $request->email)->first();

            $post = null;
            if (empty($users)) {
                $post = TopPopular_Model::select("post.*")
                    ->leftJoin('post', "post.id", "=", "top_popular.post_id")
                    ->where("post.language_id", $language->id)
                    ->where("post.status", 1)
                    ->limit(!empty($request->limit) ? $request->limit : 20)
                    ->get();
            } else {
                $post = TopPopular_Model::select(
                    "post.*",
                    'post_like.like_post as like_post',
                    'post_like.users_id'
                )
                    ->leftJoin('post', "post.id", "=", "top_popular.post_id")
                    ->leftJoin('post_like', "post_like.post_id", "=", "post.id")
                    ->where("post_like.users_id", $users->id)
                    ->where("post.language_id", $language->id)
                    ->where("post.category_id", $id)
                    ->where("post.status", 1)
                    ->where("top_popular.status", 1)
                    ->limit(!empty($request->limit) ? $request->limit : 20)
                    ->get();
            }
            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "like_post" => $value->like_post ? true : false,
                    "users_id" => $value->users_id,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        } else {
            $post = TopPopular_Model::select("post.*")
                ->leftJoin('post', "post.id", "=", "top_popular.post_id")
                ->where("post.language_id", $language->id)
                ->where("post.status", 1)
                ->where("top_popular.status", 1)
                ->limit(!empty($request->limit) ? $request->limit : 20)
                ->get();
            $data = array();
            foreach ($post as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "category_name" => $value->category_name,
                    "image" => "https://api.onicorn.vn/public/upload/images/post/large/" . $value->image,
                    "start_count" => $value->star_review
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        }
    }
}
