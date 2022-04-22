<?php

namespace App\Modules\ICO\Controllers;

use App\Modules\ICO\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Referral extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        $user =Auth::user();
        $referral = DB::table('referral')->where('user_id',$user->id)->get('active_referral');

        $Registered = count($referral);
        $Active = count($referral->where('active_referral',1));
        $Incentives = count($referral->where('active_referral',0));

        $users = DB::table('users')
            ->select('email','fullname','active_referral','bonus')
            ->join('referral','referral.referral_user_id',"=",'users.id')
            ->where('referral.user_id','=',$user->id)
            ->get();
        return view("ICO::referral.index" ,compact('Registered','Active','Incentives','users'));
    }

}
