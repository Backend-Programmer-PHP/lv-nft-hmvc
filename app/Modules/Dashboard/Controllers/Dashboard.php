<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Helpers\Helper;
use App\Modules\Dashboard\Models\RolePermission_Model;
use Illuminate\Support\Facades\Redis;

class Dashboard extends Controller
{
    public function __construct()
    {
        $className = explode("\\", get_class())[4];
    }
    public function index()
    {
        if (!Gate::allows('view', explode("\\", get_class())[4])) {
            abort(403);
        }
        $totalSupply = Helper::api_get("/token/total-suply")->totalSupply;
		//$totalSupply = "0";
        $settings = config('global.settings');
        $row = json_decode(json_encode([
            "title" => "Quản trị hệ thống",
        ]));
        return view("Dashboard::dashboard.index", compact("row","settings","totalSupply"));
    }
}
