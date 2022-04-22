<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Admins_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class MyAccount extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = "";
        $row = json_decode(json_encode([
            "title" => "My Account",
            "desc" => "Thông tin",
        ]));
        return view("Dashboard::myaccount.edit", compact("row", "data"));
    }


    public function update(Request $request)
    {
        $settings = config('global.settings');
        $this->validate(
            $request,
            ["password" => "required", "new_password" => "required", "confirm_password" => "required|same:new_password"],
            [
                "password.required" => "Vui lòng nhập mật khẩu cũ",
                "new_password.required" => "Vui lòng nhập mật khẩu mới",
                "confirm_password.required" => "Vui lòng nhập xác nhận mật khẩu mới",
                "confirm_password.same" => "Nhập lại mật khẩu mới không đúng",
            ]
        );
        $auth = Auth::guard("admin")->user();
        $admins = Admins_Model::find($auth->id);

        if (!Hash::check($request->password, $admins->password)) {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Mật khẩu cũ không đúng."]);
        }
        $admins->password = Hash::make($request->confirm_password);
        if ($admins->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }
}
