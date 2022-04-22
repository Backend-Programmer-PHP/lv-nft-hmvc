<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Category_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Category extends Controller
{
    public function getlist_categories()
    {
        $category = Category_Model::select('categories.*')
                    ->orderBy("id","desc")
                    ->get();
        return response()->json([
            "status" => true,
            "msg" => "Query successful",
            "data" => $category,
        ]);
    }
    public function index(Request $request)
    {
        $language = Language_Model::where("lang_code", $request->language)->first();
        $category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->where("parent_id", empty($request->parent_id) ? 0 : $request->parent_id)
            ->orderBy("sort", "asc")
            ->get();
        $data = array();
        foreach ($category as $value) {
            array_push($data, [
                "id" => $value->id,
                "parent_id" => $value->parent_id,
                "type" => $value->type,
                "category_name" => $value->category_name,
                "imageUri" => "https://api.onicorn.vn/public/upload/images/category/large/".$value->imageUri,
                
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }

    public function allCategory(Request $request){
        $language = Language_Model::where("lang_code", $request->language)->first();
        $category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->orderBy("sort", "asc")
            ->get();
        $data = array();
        foreach ($category as $value) {
            array_push($data, [
                "id" => $value->id,
                "parent_id" => $value->parent_id,
                "type" => $value->type,
                "category_name" => $value->category_name,
                "imageUri" => "https://api.onicorn.vn/public/upload/images/category/large/".$value->imageUri,
                
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }


    /*
    public function topplace(Request $request){
        $language = Language_Model::where("lang_code", $request->language)->first();
        $id= $language->id==1? 15 : 16;
        $category = Category_Model::where("status", 1)
            ->where("language_id", $language->id)
            ->where("id", $id)
            ->orderBy("sort", "asc")
            ->get();
        $data = array();
        foreach ($category as $value) {
            array_push($data, [
                "id" => $value->id,
                "parent_id" => $value->parent_id,
                "type" => $value->type,
                "category_name" => $value->category_name,
                "imageUri" => "https://api.onicorn.vn/public/upload/images/category/large/".$value->imageUri
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }*/
}
