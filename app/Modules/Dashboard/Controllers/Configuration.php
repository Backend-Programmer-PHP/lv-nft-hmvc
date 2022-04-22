<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Models\Config_Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;

class Configuration extends Controller {

    public function __construct() {
        
    }

    public function setting() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cài đặt website",
        ]));
        return view("Dashboard::config.setting", compact("row", "settings"));
    }

    public function postSetting(Request $request) {
        $settings = config('global.settings');
        $logo = str_replace("\\", "/", base_path()) . '/public/upload/images/logo/' . $settings["PHOTO_LOGO"];

        if ($request->hasFile('PHOTO_LOGO')) {
            //delete befor upload
            if (file_exists($logo)) {
                File::delete($logo);
            }
            
            $file = $request->PHOTO_LOGO;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            // close upload image
            $file->move("public/upload/images/logo/", $file_name);
            //save database
            Config_Model::where('name', "PHOTO_LOGO")->update(['value' => $file_name]);
        }
        $logo_footer = str_replace("\\", "/", base_path()) . '/public/upload/images/logo/' . $settings["PHOTO_LOGO_FOOTER"];
        if ($request->hasFile('PHOTO_LOGO_FOOTER')) {
            //delete befor upload
            if (file_exists($logo_footer)) {
                File::delete($logo_footer);
            }
            $file = $request->PHOTO_LOGO_FOOTER;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            // close upload image
            $file->move("public/upload/images/logo/", $file_name);
            //save database
            Config_Model::where('name', "PHOTO_LOGO_FOOTER")->update(['value' => $file_name]);
        }
        $favicon = str_replace("\\", "/", base_path()) . '/public/upload/images/logo/' . $settings["PHOTO_FAVICON"];
        if ($request->hasFile('PHOTO_FAVICON')) {
            //delete befor upload            
            if (file_exists($favicon)) {
                File::delete($favicon);
            }
            $file = $request->PHOTO_FAVICON;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            // close upload image
            $file->move("public/upload/images/logo/", $file_name);
            //save database
            Config_Model::where('name', "PHOTO_FAVICON")->update(['value' => $file_name]);
        }        
        Config_Model::where('name', "COMPANY")->update(['value' => $request->COMPANY]);
        Config_Model::where('name', "EMAIL")->update(['value' => $request->EMAIL]);
        Config_Model::where('name', "PHONE")->update(['value' => $request->PHONE]);
        Config_Model::where('name', "ADDRESS")->update(['value' => $request->ADDRESS]);
        Config_Model::where('name', "GOOGLE_MAPS")->update(['value' => $request->GOOGLE_MAPS]);
        Config_Model::where('name', "MAINTAIN_MODE")->update(['value' => $request->MAINTAIN_MODE]);
        //Config_Model::where('name', "BGPOINT_API_SECRET_KEY")->update(['value' => $request->BGPOINT_API_SECRET_KEY]);
        Config_Model::where('name', "PRIVACY_CONTENT_EN")->update(['value' => $request->PRIVACY_CONTENT_EN]);
        Config_Model::where('name', "PRIVACY_CONTENT_VI")->update(['value' => $request->PRIVACY_CONTENT_VI]);
        return redirect()->route("admin.config")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }

    public function ICO() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cấu hình ICO",
        ]));
        return view("Dashboard::config.ico", compact("row", "settings"));
    }
    public function postICO(Request $request) {
        Config_Model::where('name', "ICO_NAME")->update(['value' => $request->ICO_NAME]);
        Config_Model::where('name', "ICO_SYMBOL")->update(['value' => $request->ICO_SYMBOL]);
        Config_Model::where('name', "ICO_DECIMALS")->update(['value' => $request->ICO_DECIMALS]);
        Config_Model::where('name', "ICO_CONTRACT_ADDRESS")->update(['value' => $request->ICO_CONTRACT_ADDRESS]);
        
        return redirect()->route("admin.config.ico")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }

    public function seo() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cấu hình SEO",
        ]));
        return view("Dashboard::config.seo", compact("row", "settings"));
    }

    public function postSeo(Request $request) {
        for ($i = 1; $i <= 5; $i++) {
            Config_Model::where('name', "LINK_WEBSITE")->update(['value' => $request->link_website]);
            Config_Model::where('name', "TITLE")->update(['value' => $request->title]);
            Config_Model::where('name', "META_KEYWORD")->update(['value' => $request->keyword]);
            Config_Model::where('name', "META_DESCRIPTION")->update(['value' => $request->description]);
        }
        if ($request->hasFile('photo')) {
            $settings = config('global.settings');
            //delete befor upload new
            $thumb_image_facebook = str_replace("\\", "/", base_path()) . '/public/upload/images/facebook/thumb/' . $settings["PHOTO_SHARE"];
            $thumb_image_twitter = str_replace("\\", "/", base_path()) . '/public/upload/images/twitter/thumb/' . $settings["PHOTO_SHARE"];
            $thumb_image_zalo = str_replace("\\", "/", base_path()) . '/public/upload/images/zalo/thumb/' . $settings["PHOTO_SHARE"];

            if (file_exists($thumb_image_facebook)) {
                File::delete($thumb_image_facebook);
            }
            if (file_exists($thumb_image_twitter)) {
                File::delete($thumb_image_twitter);
            }
            if (file_exists($thumb_image_zalo)) {
                File::delete($thumb_image_zalo);
            }

            $file = $request->photo;
            $file_name = Str::slug($file->getClientOriginalName(), "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                //facebook
                $image_resize_facebook = Image::make($file->getRealPath());
                $image_resize_facebook->fit(600, 314);
                $image_resize_facebook->save('public/upload/images/facebook/thumb/' . $file_name);
                //twitter
                $image_resize_twitter = Image::make($file->getRealPath());
                $image_resize_twitter->fit(280, 150);
                $image_resize_twitter->save('public/upload/images/twitter/thumb/' . $file_name);
                //zalo
                $image_resize_zalo = Image::make($file->getRealPath());
                $image_resize_zalo->fit(480, 250);
                $image_resize_zalo->save('public/upload/images/zalo/thumb/' . $file_name);
            }
            // close upload image
            //$file->move("public/upload/images/users/large", $file_name);
            //save database
            Config_Model::where('name', "PHOTO_SHARE")->update(['value' => $file_name]);
        }
        return redirect()->route("admin.config.seo")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }

    public function social() {
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Cấu hình mạng xã hội",
        ]));
        return view("Dashboard::config.social", compact("row", "settings"));
    }

    public function postSocial(Request $request) {
        for ($i = 1; $i <= 6; $i++) {
            Config_Model::where('name', "LINK_FACEBOOK")->update(['value' => $request->LINK_FACEBOOK]);
            Config_Model::where('name', "LINK_INSTAGRAM")->update(['value' => $request->LINK_INSTAGRAM]);
            Config_Model::where('name', "LINK_LINKEDIN")->update(['value' => $request->LINK_LINKEDIN]);
            Config_Model::where('name', "LINK_TWITTER")->update(['value' => $request->LINK_TWITTER]);
            Config_Model::where('name', "LINK_YOUTUBE")->update(['value' => $request->LINK_YOUTUBE]);
            Config_Model::where('name', "LINK_SKYPE")->update(['value' => $request->LINK_SKYPE]);
        }
        return redirect()->route("admin.config.social")->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
    }

    public function footer() {
        
    }

    public function header() {
        
    }

    public function code() {
        
    }

}
