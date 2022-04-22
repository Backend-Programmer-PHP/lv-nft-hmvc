<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Models\Config_Model;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Setting extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $permission = Permission::access(Auth::getUser()->id);
            foreach ($permission as $key => $value) {
                if ($value->class == "Setting" && $value->status == 0) {
                    return redirect("admin/403");
                }
            }
            return $next($request);
        });
    }

    public function thumb() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cấu hình hình ảnh",
        ]));
        return view("Dashboard::setting.thumb", compact("row", "settings"));
    }

    public function postThumb(Request $request) {
        Config_Model::where('name', "THUMB_SIZE_PRODUCT")->update(['value' => $request->thumb_product]);
        Config_Model::where('name', "THUMB_SIZE_PRODUCT_CATEGORY")->update(['value' => $request->thumb_product_category]);
        Config_Model::where('name', "THUMB_SIZE_BLOG")->update(['value' => $request->thumb_blog]);
        Config_Model::where('name', "THUMB_SIZE_BLOG_CATEGORY")->update(['value' => $request->thumb_blog_category]);
        Config_Model::where('name', "THUMB_SIZE_SLIDE")->update(['value' => $request->thumb_slide]);
        Config_Model::where('name', "THUMB_SIZE_USERS")->update(['value' => $request->thumb_users]);
        Config_Model::where('name', "THUMB_SIZE_SERVICE")->update(['value' => $request->thumb_service]);
        Config_Model::where('name', "THUMB_SIZE_PROJECT")->update(['value' => $request->thumb_project]);
        Config_Model::where('name', "THUMB_SIZE_BRAND")->update(['value' => $request->thumb_brand]);
        return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }

}
