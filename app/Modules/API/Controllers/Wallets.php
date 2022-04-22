<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Wallets_Model;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Wallets extends Controller
{
    public function index()
    {
        $wallets = Wallets_Model::select('address','chain','network')->get();
        return response()->json([
            'status' => true,
            'msg' => 'Query Sussers',
            'data' => $wallets,
        ]);
    }
    // add wallet:
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),[
                'address' => 'required',
                'chain'   => 'required',
                'network' => 'required',
                'users_id' => 'required',
            ],
        );
        //test fail
        if($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        // $users = Users_Model::where('email', $request->email)->where("status", 1)->first();
        $wallet = Wallets_Model::create($request->all());
        // $wallet->users_id = $users->id;
        $wallet->status = 1;
        $wallet->save();
        return response()->json([
            "status" => true,
            "msg" => "successfully added wallet"
        ]);
    }
}
