<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Category_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
//use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;
use App\Modules\Dashboard\Models\Config_Model;

class Safety extends Controller {

    public function __construct() {
    }

    public function editEN(){
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Safety - Tiếng anh",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::safety.edit_en", compact("row", "settings"));
    }

    public function postEditEN(Request $request){
        $settings = config('global.settings');
        Config_Model::where('name', "SAFETY_CONTENT_EN")->update(['value' => $request->SAFETY_CONTENT_EN]);
        $row = json_decode(json_encode([
            "title" => "Safety - Tiếng anh",
            "desc" => "Chỉnh sửa",
        ]));
        return redirect()->route("admin.safety.english")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }


    public function editVI(){
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Safety - Tiếng việt",
            "desc" => "Chỉnh sửa",
        ]));
        return view("Dashboard::safety.edit_vi", compact("row", "settings"));
    }

    public function postEditVI(Request $request){
        $settings = config('global.settings');
        Config_Model::where('name', "SAFETY_CONTENT_VI")->update(['value' => $request->SAFETY_CONTENT_VI]);
        $row = json_decode(json_encode([
            "title" => "Safety - Tiếng việt",
            "desc" => "Chỉnh sửa",
        ]));
        return redirect()->route("admin.safety.vietnam")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }
    
}