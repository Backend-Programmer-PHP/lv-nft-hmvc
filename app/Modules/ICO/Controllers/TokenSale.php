<?php

namespace App\Modules\ICO\Controllers;

use App\Modules\ICO\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use TheSeer\Tokenizer\Exception;

class TokenSale extends Controller
{

    public function __construct()
    {

    }

    public function index($id){
        $user = Auth::user();
        $wallet = DB::table('wallet')->where('users_id',$user->id)->first();
        $eth_info = Helper::api_get("/wallet/get-balance?address=".$wallet->address);
        $eth_balance = $eth_info->balance;

        $rate = DB::table('rate')->where('phase_id',$id)->first();

        $phase = DB::table('phase')->where('id',$id)->first();
        return view("ICO::token.index",compact("eth_balance","rate","phase"));
    }

    public function getTokenRemaining(Request $request){
        $phase = DB::table('phase')->where('id',$request->id)
            ->where('status',"=",'1')
            ->where('start_date',"<=",now())
            ->where('end_date',">=",now());
        if(!$phase->exists()){
            return response()->json([
                'status'=>'false',
                'msg'=>'Request illegal',
            ]);
        }
        $phase = $phase->first();
        $rate = DB::table('rate')->where('phase_id',$request->id)->first();

        return response()->json([
            'status'=>'true',
            'token_remaining'=>number_format($phase->token_remaining),
            'limit_buy_token'=>$phase->limit_buy_token*$rate->eth/$rate->token
        ]);
    }

    public function getEthRateToken(Request $request){

        $phase = DB::table('phase')->where('id',$request->id)
            ->where('status',"=",'1')
            ->where('start_date',"<=",now())
            ->where('end_date',">=",now());
        if(!$phase->exists()){
            return response()->json([
                'status'=>'false',
                'msg'=>'Request illegal',
            ]);
        }
        $phase = $phase->first();
        $rate = DB::table('rate')->where('phase_id',$request->id)->first();
        $token = 0;
        $eth = 0;
        if ($request->has('eth')){
            $token = (float)$request->eth * (int)$rate->token / (float)$rate->eth;
        }
        if($request->has('token')){
            $eth = (float)$request->token *(float)$rate->eth / (int)$rate->token ;

        }
        return response()->json([
            'status'=>'true',
            'token'=>$token,
            'eth'=>$eth
        ]);

    }

    public function getTokenLimit(Request $request){

        $phase = DB::table('phase')->where('id',$request->id)
            ->where('status',"=",'1')
            ->where('start_date',"<=",now())
            ->where('end_date',">=",now());
        if(!$phase->exists()){
            return response()->json([
                'status'=>'false',
                'msg'=>'Request illegal',
            ]);
        }
        $phase = $phase->first();
        if($request->has('quantity_token')){
            if($request->quantity_token < $phase->limit_buy_token){
                return response()->json([
                    'status'=>'false',
                    'msg'=>'Purchase quantity must be greater than the limit'
                ]);
            }else{
                return response()->json([
                    'status'=>'true',
                ]);
            }

        }
    }

    public function getFee(){
        $user = Auth::user();
        $wallet = DB::table('wallet')->where('users_id',$user->id)->first();
        $fee =Helper::api_get("/token/get-fee?address=".$wallet->address);
        $value = $fee->value;
        return response()->json([
            'status'=>'true',
            'data'=>$value
        ]);
    }
    public function buyToken(Request $request){
        DB::beginTransaction();

        try {
            $this->validate($request, [
                "quantity_token" => "required",
            ]);
            //check phase
            $phase = DB::table('phase')->where('id',$request->phase_id)
                ->where('status',"=",'1')
                ->where('start_date',"<=",now())
                ->where('end_date',">=",now());
            //check phase exists
            if(!$phase->exists()){
                return redirect()->back()->withInput()->with(['type'=>'warning','flash_message'=>'Request illegal']);
            }
            $phase = $phase->first();
            //check quantity_token
//            if($request->quantity_token > $phase->token_remaining){
//                return redirect()->back()->withInput()->with(['type'=>'warning','flash_message'=>'The purchase quantity exceeds the maximum quantity']);
//            }
//            if($request->quantity_token < $phase->limit_buy_token){
//                return redirect()->back()->withInput()->with(['type'=>'warning','flash_message'=>'Purchase quantity must be greater than the limit '.$phase->limit_buy_token]);
//            }

            $user = Auth::user();
            //check balance wallet
            $wallet = DB::table('wallet')->where('users_id',$user->id)->first();
            $eth_info = Helper::api_get("/wallet/get-balance?address=".$wallet->address);
            $eth_balance = $eth_info->balance;
            //get eth user pay
            $rate = DB::table('rate')->where('phase_id',$request->phase_id)->first();
            $eth_user_pay = (float)$request->quantity_token * $rate->eth / $rate->token;
//            $fee =Helper::api_get("/token/get-fee?address=".$wallet->address);
//            $fee = $fee->value;
//            $eth_user_pay = $eth_user_pay + (float)$fee;
//            $eth_user_pay = $eth_user_pay;
//            if($eth_balance < $eth_user_pay){
//                return redirect()->back()->withInput()->with(['type'=>'warning','flash_message'=>'The balance in the account is not enough']);
//            }

            //insert table order
            DB::table('order')->insert([
                'users_id'=>$user->id,
                'wallet_id'=>$wallet->id,
                'rate_id'=>$rate->id,
                'quantity_token'=>$request->quantity_token,
                'quantity_eth'=>$eth_user_pay,
                'phase_id'=>$request->phase_id,
                'status'=>0,
                'created_at'=>Carbon::now()
            ]);

            //update table phase col token_remaining
//            DB::table('phase')->where('id',$phase->id)->update([
//                'token_remaining'=>$phase->token_remaining - (int)$request->quantity_token,
//                'updated_at'=>Carbon::now()
//            ]);
            DB::commit();
            return redirect()->route('ico.order.index')->withInput()->with(['type'=>'success','flash_message'=>'You have created an order, and are waiting for payment']);

        }catch (Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}
