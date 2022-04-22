<?php
namespace App\Modules\ICO\Controllers;

use View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\ICO\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

//You can create a BaseController:

class Base extends Controller {

    public function __construct() {
        $user = Auth::user();
        $settings = config('global.settings');


        $token = $user->token_bgpoint;
        $url = "https://bg.wta.finance/api/point/getPoint";
        $call_api_bg_point = Helper::api_bgPoint_getPoint($url, $body,$token);
        $bg_point=(object)$call_api_bg_point;

        View::share ( 'user', $user );
        View::share ( 'bg_point', $bg_point );

    }

}