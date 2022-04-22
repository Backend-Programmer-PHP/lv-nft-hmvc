<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\CategoryFaq_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class CategoryFaq extends Controller
{
    //Get list category faq:
    public function index(Request $request)
    {
        $data = CategoryFaq_Model::select("id","name")->where("status",1)->get();
        return response()->json([
            "status" => true,
            "msg"  => "Query successfully",
            "data" => $data
        ]);
    }


   
}
