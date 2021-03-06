<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Admins_Model;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    public function login()
    {
        if (Auth::guard("admin")->check()) {
            return redirect()->route("dashboard.index");
        }
        return view("Dashboard::authentication.login");
    }

    public function login_request(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required",
        ], [
            "email.required" => "Please enter your email",
            "password.required" => "Please enter your password",
        ]);

        $auth = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        if (Auth::guard("admin")->attempt($auth, $remember = true)) {
            return redirect()->route("dashboard.index");
        } else {
            return redirect()->route("dashboard.login")->with(["type" => "danger", "flash_message" => "Email or password is wrong"]);
        }
    }

    public function logout(){
        Auth::guard("admin")->logout();
        if (!Auth::guard("admin")->check()) {
            return redirect()->route("dashboard.login");
        }
    }

    public function create()
    {
        $admin = new Admins_Model;
        $admin->email = "admin";
        $admin->password = Hash::make("123");
        $admin->type = 0; // 0 is normal, 1 is dev
        $admin->fullname = "luan";
        $admin->gender = "1";
        $admin->status = 0;
        $admin->remember_token = "";
        $status = $admin->save();
    }
}
