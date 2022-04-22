<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Category_Model;
use App\Modules\API\Models\News_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Models\Users_Model;

class News extends Controller
{
    public function index(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        if (!empty($request->email)) {
            $users = Users_Model::select('id')->where("email", $request->email)->first();
            $news = null;
            if (empty($users)) {
                $news = News_Model::where("status", 1)
                    ->where("status", 1)
                    ->where("language_id", $language->id)
                    ->orderBy("id", "desc")
                    ->limit($request->limit)->get();
            } else {
                $news = News_Model::select("news.*", "news_like.like_post as like_post")
                    ->leftJoin('news_like', "news_like.news_id", "=", "news.id")
                    ->where("news.status", 1)
                    ->where("news_like.users_id", $users->users_id)
                    ->where("news.language_id", $language->id)
                    ->orderBy("news.id", "desc")
                    ->limit($request->limit)->get();
            }
            $data = array();
            foreach ($news as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "users_id" => $value->users_id,
                    "like_post" => $value->like_post ? true : false,
                    "image" => "https://api.onicorn.vn/public/upload/images/news/large/" . $value->imageUri
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        } else {
            $news = News_Model::where("status", 1)
                ->where("language_id", $language->id)
                ->orderBy("id", "desc")
                ->limit($request->limit)->get();
            $data = array();
            foreach ($news as $value) {
                array_push($data, [
                    "id" => $value->id,
                    "title" => $value->title,
                    "like_post" => false,
                    "image" => "https://api.onicorn.vn/public/upload/images/news/large/" . $value->image
                ]);
            }
            return response()->json([
                "status" => true,
                "data" => $data,
                "msg" => "Query successful"
            ]);
        }
    }

    public function detail(Request $request){
        $language = Language_Model::where("lang_code", $request->language)->first();
        $news = News_Model::where("status", 1)
        ->where("id", $request->id)->first();

        $data = [];
        array_push($data,[
            "id"=>$news->id,
            "title"=>$news->title,
            "content"=>$news->content,
            "image"=> "https://api.onicorn.vn/public/upload/images/news/large/" .$news->image,
            "date" => date("d/m/Y",strtotime($news->created_at))
        ]);

        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }
}
