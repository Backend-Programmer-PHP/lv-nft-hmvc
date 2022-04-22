<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Sliders_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Sliders extends Controller
{

    public function index($language = "en")
    {
        $language = Language_Model::where("lang_code", $language)->first();
        $sliders = Sliders_Model::where("status", 1)->where("language_id", $language->id)->orderBy("sort", "asc")->get();
        $data = array();
        foreach ($sliders as $value) {
            array_push($data, [
                "id" => $value->id,
                "title" => $value->title,
                "description" => $value->description,
                "imageUri" => "https://api.onicorn.vn/public/upload/images/slide/large/" .$value->image,
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }
}
