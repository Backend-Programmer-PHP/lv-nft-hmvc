<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role extends Controller
{
    public function __construct()
    {
        $className = explode("\\", get_class())[4];
        //echo $className;
    }
    
    public function index()
    {
        $row = json_decode(json_encode([
            "title" => "Vai trò",
        ]));
        return view("Dashboard::dashboard.index", compact("row"));
    }
}
