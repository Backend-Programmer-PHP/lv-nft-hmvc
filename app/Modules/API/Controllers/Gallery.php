<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Gallery_Model;
use App\Modules\API\Models\GalleryCategory_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Gallery extends Controller
{
    public function index(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        $galleryCategory = GalleryCategory_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->orderBy("sort", "asc")
            ->get();
        $data = array();
        foreach ($galleryCategory as $value) {
            array_push($data, [
                "id" => $value->id,
                "name" => $value->name,
                "title" => $value->title,
                "image" => "https://api.onicorn.vn/public/upload/images/gallery/large/".$value->image,
                "date" => date("d-m-Y",strtotime($value->created_at))
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }

    public function detail(Request $request){
        $gallery = Gallery_Model::select("gallery.*","gallery_category.title as category_name")
        ->leftJoin('gallery_category', "gallery_category.id", "=", "gallery.gallery_category_id")
        ->where("gallery_category_id",$request->gallery_category_id)
        ->where("gallery.status",1)
        ->get();
        $data = array();
        foreach ($gallery as $value) {
            array_push($data, [
                "id" => $value->id,
                "title" => $value->title,
                "imageUri" => "https://api.onicorn.vn/public/upload/images/gallery/large/".$value->image,
                "date" => date("d-m-Y",strtotime($value->created_at)),
                "category_name" => $value->category_name
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }
}
