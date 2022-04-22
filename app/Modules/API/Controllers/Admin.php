<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Admins_Model;

class Admin extends Controller {

    public function abc(Request $request) {
        echo "abc";
        //return response()->json(['status'=>true,'msg'=>'aaaa']);
    }

    public function register(Request $request) {
        $admin = new Admins_Model;
        $admin->email = "api_admin@gmail.com";
        $admin->password = Hash::make(empty($request->password)?"123":$request->password);
        $admin->type = 0; // 0 is normal, 1 is dev
        $admin->fullname = "luan";
        $admin->gender = "1";
        $admin->status = 1;
        $admin->remember_token = "";
        $status = $admin->save();
    }
    
    public function login(Request $request) {
        if (Auth::guard("admin")->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard("admin")->user();
            $message['token'] = $user->createToken('App_Tourism')->accessToken;
            return response()->json(['status'=>true,"msg"=>$message]);
           //echo "aaaa";
        } else {
            return response()->json(['status'=>false,"msg"=>'Unauthorised ']);
        }
    }
}