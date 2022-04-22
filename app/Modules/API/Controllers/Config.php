<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Category_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class Config extends Controller
{
    public function index(Request $request)
    {
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => [
                "logo" => 'https://api.onicorn.vn/public/upload/images/logo/' . $settings['PHOTO_LOGO'],
                "show_logo" => $settings['SHOW_LOGO'],
                "banner_top" => 'https://api.onicorn.vn/public/upload/images/banner/' . $settings['BANNER'],
                "banner_bottom" => 'https://api.onicorn.vn/public/upload/images/banner/' . $settings['BANNER_BOTTOM']
            ],
            "msg" => "Query successful"
        ]);
    }

    public function privacy(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['PRIVACY_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }

    public function aboutus(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['ABOUT_US_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }

    public function visa(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['VISA_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }

    public function safety(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['SAFETY_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }
    public function emergency(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['EMERGENCY_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }
    
    public function embassy(Request $request)
    {
        //$language = Language_Model::where("lang_code", $request->language)->first();
        $settings = config('global.settings');
        return response()->json([
            "status" => true,
            "data" => $settings['EMBASSY_CONTENT_' . strtoupper($request->language)],
            "msg" => "Query successful"
        ]);
    }
    
}
