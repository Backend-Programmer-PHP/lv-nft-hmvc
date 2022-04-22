<?php

namespace App\Modules\ICO\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{

    public function __construct()
    {
        //if (Auth::guard("web")->check()) {
//            return redirect()->route("ico.home.login");
  //      }
    }

    public function index(){
        return view("ICO::layout");
    }

}
