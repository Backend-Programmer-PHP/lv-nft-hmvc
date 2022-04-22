<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Users_Model;
use App\Modules\Dashboard\Models\Airdrop_Model;
use App\Modules\Dashboard\Models\Bonus_Model;
use App\Modules\Dashboard\Models\Referral_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Referral extends Controller
{

    public function __construct()
    {
        //Artisan::call('cache:clear');    
    }

    public function index()
    {
        $settings = config('global.settings');
        $data = null;
        if (Cookie::get('search_ref') == "") {
            // if cookie not existed
            $data = Referral_Model::select(
                "users.fullname",
                "users.photo",
                "users.status as users_tatus",
                "users.email",
                "users.kyc_status",
                "referral.*",
                DB::raw('count(referral_user_id) as count_total')
            ) //"bonus.airdrop_id",
                ->leftJoin("users", "users.id", "=", "referral.referral_user_id")
                ->where("users.kyc_status", 1)
                ->groupBy('referral.referral_user_id')
                ->having('count_total', '>=', 1)
                ->orderBy('count_total', 'desc')
                ->paginate(15);
        } else {
            // if cookie is existed
            $data = Referral_Model::select("users.*") //,"referral.*"
                ->leftJoin("users", "users.id", "=", "referral.user_id")
                ->where("users.kyc_status", 1)
                ->where("users.email", "like", '%' . Cookie::get('search_ref') . '%')
                ->orderBy('users.id', 'desc')
                ->paginate(15);
        }
        $data->setPath('referral');

        $row = json_decode(json_encode([
            "title" => "Users Referral - Danh sách",
        ]));
        return view("Dashboard::referral.index", compact("row", "settings", "data"));
    }

    public function details($id = 0)
    {
        $settings = config('global.settings');
        $ref_detail = Referral_Model::select("users.*","referral.airdrop_id")
        ->leftJoin("users", "users.id", "=", "referral.referral_user_id")
        ->where("referral_user_id", $id)
        ->first();
        $data = Referral_Model::select(
            "users.fullname",
            "users.email",
            "users.photo",
            "referral.kyc",
            "referral.user_id",
            "referral.status as referral_status",
            "airdrop.referral_value"
        )->leftJoin("users", "users.id", "=", "referral.user_id")
            ->leftJoin("airdrop", "airdrop.id", "=", "referral.airdrop_id")
            ->where("referral.referral_user_id", $id)
            ->paginate(15);
        //$data->setPath('referral/details');
        $row = json_decode(json_encode([
            "title" => "Users Referral - Details",
            "desc" => "Detail Referral",
        ]));
        return view("Dashboard::referral.details", compact("row", "settings", "data", 'ref_detail'));
    }
}
