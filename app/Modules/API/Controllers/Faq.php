<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Category_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Models\Faq_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Faq extends Controller
{
    public function index(Request $request)
    {   
        //test fail
        $validator = Validator::make(
            $request->all(),[
                'category_faq_id' => 'nullable|numeric',
            ],
        );
        
        //test fail
        if($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }   
        $category = $request->faq_category_id;
        
        if($category != null) {
            $faq = Faq_Model::select('faq.title', "category_faq.name" ,'faq.content','faq.category_faq_id')
                            ->leftJoin('category_faq', "category_faq.id", "=", "faq.category_faq_id")
                            ->where('faq.category_faq_id', '=' , $category)
                            ->where('category_faq.status',1)->get();
            
        } else {
            $faq = Faq_Model::select('title','content')
                            ->where('status',1)->get();
        }
        return response()->json([
            "status" => true,
            "msg" => "Query successful",
            "data" => $faq,
        ]);
    }
    // link 2 tables : faq and category faq.
    public function relationship()
    {
        $faq = Faq_Model::select("faq.id","category_faq.name","faq.title","faq.content")
               ->leftJoin('category_faq', "category_faq.id", "=", "faq.category_faq_id")
               ->where('category_faq.status', 1)
               ->get();
        return response()->json([
            "status" => true,
            "msg" => "Query successful",
            "data" => $faq,
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
