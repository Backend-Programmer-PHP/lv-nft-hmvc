<?php

namespace App\Modules\ICO\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\ICO\Helpers\Helper;
use Image;
//use Base;
class Dashboard extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $user = Auth::user();
        $phase = DB::table('phase')->orderBy('end_date', 'desc')->get();
        $past = DB::table('phase')->where('phase.status', "=", 1)->orderBy('phase.end_date', 'desc')
            ->where('phase.start_date', "<", now())->where('phase.end_date', "<", now())
            ->join('rate', 'rate.phase_id', '=', 'phase.id')
            ->select('phase.id', 'phase.name', 'phase.start_date', 'phase.end_date', 'phase.token_number', 'rate.token', 'rate.bnb', 'phase.price');
        //        dd($past->first());
        $now = DB::table('phase')->where('phase.status', "=", 1)
            ->where('phase.start_date', "<=", now())->where('phase.end_date', ">=", now())
            //            ->orderBy('phase.start_date','asc')->limit(1)
            ->join('rate', 'rate.phase_id', '=', 'phase.id')
            ->select('phase.id', 'phase.name', 'phase.start_date', 'phase.end_date', 'phase.token_number', 'rate.token', 'rate.bnb', 'phase.price');

        //        dd($now->exists());
        $coming = DB::table('phase')->where('status', "=", 1)->where('start_date', ">", now())
            ->orderBy('start_date', 'asc')->limit(1);
        //        $user = Auth::user();

        $checkWallet = DB::table('wallet')->where('users_id', $user->id);
        $address = "";
        $token_balance = 0;
        if ($checkWallet->exists()) {
            $address = $checkWallet->first()->address;
            // for check balance ETH
            $eth_info = Helper::api_get("/wallet/get-balance?address=" . $address);
            $eth_balance = $eth_info->balance;
            $balanceOf = Helper::api_get("/token/balanceOf?address=" . $address);
            $token_balance = $balanceOf->balance;
        } else {
            $wallet = Helper::api_get("/wallet/create");
            $address = $wallet->address;
            $privateKey = $wallet->privateKey;
            DB::table('wallet')->insert([
                'users_id' => $user->id,
                'address' => $address,
                'privatekey' => $privateKey,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
            // for check balance ETH
            $eth_balance = Helper::api_get("/wallet/get-balance?address=" . $address);
            $eth_balance = $eth_balance->balance;
            $balanceOf = Helper::api_get("/token/balanceOf?address=" . $address);
            $token_balance = $balanceOf->balance;
        }
        //referral value
        $bonus_value = DB::table('bonus')->where('bonus.users_id', $user->id)->where('bonus.status', 1)
            ->join('airdrop', 'bonus.airdrop_id', 'airdrop.id')
            ->sum('airdrop.bonus_value');
        $referral_value = DB::table('referral')
            ->where('referral.referral_user_id', $user->id)
            ->where('referral.status', 1)
            ->where('referral.kyc', 1)
            ->join('airdrop', 'referral.airdrop_id', 'airdrop.id')
            ->sum('airdrop.referral_value');
        $total_value = $bonus_value + $referral_value;
        $wtabalanceOf_owner = Helper::api_get("/token/balanceOf?address=0xB1A05C9e81b6136035F0A8f59Ef50BAc6b61f0e1")->balance;
        //        dd($referral_value+$bonus_value);
        return view(
            "ICO::dashboard.index",
            compact("phase", "now", "coming", "eth_balance", "user", 'token_balance', 'past', 'total_value', 'wtabalanceOf_owner','address')
        );
    }

    public function dashboard_redirect()
    {
        return redirect()->route('ico.dashboard.index_overview');
    }
}
