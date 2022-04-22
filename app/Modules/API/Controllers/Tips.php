<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Tips_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Tips extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "language" => "required",
            ],
            []
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $language = Language_Model::where("lang_code", $request->language)->first();
        $tips = Tips_Model::where("language_id", $language->id)->where("status", 1)->paginate(15);

        return response()->json([
            "status" => true,
            "data" => $tips
        ]);
    }

    public function detail(Request $request){
        $tips = Tips_Model::find($request->id);
        return response()->json($tips);
    }
}
