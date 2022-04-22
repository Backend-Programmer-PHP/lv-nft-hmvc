<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Ask_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Ask extends Controller
{
    public function index(Request $request)
    {
        
        $ask = Ask_Model::where("status",1)->paginate(50);
        return response()->json([
            "status" => false,
            "data" => $ask
        ]);
    }


    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required",
                "language" => "required",
                "message" => "required",
            ],
            [
                "message.required" => $request->language == "vi" ? "Vui lòng nhập nội dung" : "Message is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::where('email', $request->email)->where("status", 1)->first();
        $ask = new Ask_Model;
        $ask->users_id = $users->id;
        $ask->message = $request->message;
        $ask->status = 0;
        $ask->save();
        return response()->json([
            "status" => true,
            "msg" => $request->language == "vi" ? "Đặt câu hỏi thành công" : "Ask questions successfully"
        ]);
    }
}
