<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Orders_Model;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Orders extends Controller
{
    public function index(Request $request)
    {
        // $ask = Ask_Model::where("status",1)->paginate(50);
        // return response()->json([
        //     "status" => false,
        //     "data" => $ask
        // ]);
        $validator = Validator::make(
            $request->all(),
            [
                "total" => "required|numeric",
                "date" => "nullable|date",
                "type" => "required",
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        if($request->date != null) {
            $users = Orders_Model::select("users.name" , "users.photo" , "nft_products.price")
            ->leftJoin('users', "users.id", "=", "orders.users_id")
            ->leftJoin('wallets', "wallets.id", "=", "orders.users_id")
            ->leftJoin('nft_products', "nft_products.id", "=", "orders.nft_product_id")
            ->where("date", $request->date)->where("users.status", 1)
            ->get();
        } elseif($request->total != null) {
            $users = Orders_Model::select("users.name" , "users.photo" , "nft_products.price")
            ->leftJoin('users', "users.id", "=", "orders.users_id")
            ->leftJoin('wallets', "wallets.id", "=", "orders.users_id")
            ->leftJoin('nft_products', "nft_products.id", "=", "orders.nft_product_id")
            ->where("users.status", 1)->limit($request->total)
            ->get();
        } elseif($request->type != null) {
            if($request->type == 1) {
                $users = Orders_Model::select("users.name" , "users.photo" , "nft_products.price")
                ->leftJoin('users', "users.id", "=", "orders.users_id")
                ->leftJoin('wallets', "wallets.id", "=", "orders.users_id")
                ->leftJoin('nft_products', "nft_products.id", "=", "orders.nft_product_id")
                ->where("type",'=',1)->where("users.status", 1)
                ->get();
            } else {
                $users = Orders_Model::select("users.name" , "users.photo" , "nft_products.price")
                ->leftJoin('users', "users.id", "=", "orders.users_id")
                ->leftJoin('wallets', "wallets.id", "=", "orders.users_id")
                ->leftJoin('nft_products', "nft_products.id", "=", "orders.nft_product_id")
                ->where("type",'=',0)->where("users.status", 1)
                ->get();
            }
        }
        return response()->json([
            "status" => true,
            "msg" => "successfully",
            'data' => $users,
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
