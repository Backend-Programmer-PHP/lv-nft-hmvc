<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permission extends Controller
{
    public function __construct()
    {
        $className = explode("\\", get_class())[4];
    }

    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Sự cho phép",
        ]));
        return view("Dashboard::dashboard.index", compact("row"));
    }
}
