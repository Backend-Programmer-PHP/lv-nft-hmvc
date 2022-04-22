<?php

namespace App\Modules\ICO\Controllers;

use App\Modules\ICO\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\ICO\Models\Wallet_Model;
use App\Modules\ICO\Models\Order_Model;
use App\Modules\ICO\Models\TransactionsBNB_Model;
use Image;
class Wallet extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        $user = Auth::user();
        $checkWallet = Wallet_Model::where('users_id',$user->id)->first();
        $address = "";
        if(!empty($checkWallet)){
            $address = $checkWallet->address;
        }else{
            $wallet = Helper::api_get("/wallet/create");
            $address = $wallet->address;
            $privateKey = $wallet->privateKey;
            DB::table('wallet')->insert([
                'users_id'=>$user->id,
                'address'=>$address,
                'privatekey'=>$privateKey,
                'status'=>1,
                'created_at'=>Carbon::now()
            ]);
        }
        $bnb_wallet = Wallet_Model::where('users_id',$user->id)->first();
        $now = DB::table('phase')->where('status',"=",1)
            ->where('start_date',"<=",now())->where('end_date',">=",now())
            ->orderBy('start_date','asc')->limit(1);
        $past = DB::table('phase')->where('phase.status',"=",1)->orderBy('phase.end_date','desc')
            ->where('phase.start_date',"<",now())->where('phase.end_date',"<",now())
            ->join('rate','rate.phase_id','=','phase.id')
            ->select('phase.id','phase.name','phase.start_date','phase.end_date','phase.token_number','rate.token','rate.bnb','phase.price');

        /*
        $transactions = DB::table('transactions')->where('transactions.type',1)->where('transactions.order_id','!=',NULL)
            ->join('order','order.id','=','transactions.order_id')->where('order.users_id','=',$user->id)
//            ->join('users','users.id','=','order.users_id')
            ->select('order.id','order.status','transactions.quantity_bnb','transactions.created_at',
                'transactions.quantity_token','transactions.hash','transactions.note');*/
        
        $order = Order_Model::where("users_id",$user->id)->orderby("id",'desc')->get();

        $bnb_balances = Helper::api_get("/wallet/get-balance?address=" . $address);
        $bnb_balance = $bnb_balances->balance;

        $token_balance = Helper::api_get("/token/balanceOf?address=" . $address);
        $token_balance = $token_balance->balance;
        //referral value
        $bonus_value = DB::table('bonus')->where('bonus.users_id', $user->id)->where('bonus.status',1)
            ->join('airdrop', 'bonus.airdrop_id', 'airdrop.id')
            ->sum('airdrop.bonus_value');
        $referral_value = DB::table('referral')
            ->where('referral.referral_user_id', $user->id)
            ->where('referral.status', 1)
            ->where('referral.kyc', 1)
            ->join('airdrop', 'referral.airdrop_id', 'airdrop.id')
            ->sum('airdrop.referral_value');
        $total_value = $bonus_value + $referral_value;

        $transactionsBNB = TransactionsBNB_Model::where("users_id",$user->id)->orderBy("id",'desc')->limit(50)->get();

        return view("ICO::wallet.index",compact("now","bnb_wallet",'order','bnb_balance','token_balance','past','total_value','transactionsBNB'));
    }

    public function bg_point_balance(Request $request){
        $user = Auth::user();
        $call_api_bg_point = Helper::api_bgPoint_getPoint($user->email,$user->token_bgpoint);
        $bg_point=(object)$call_api_bg_point;
        echo json_encode($bg_point);
    }

    public function withdraw_bnb(Request $request){
        $is_clear = true;
        $data = array();
        if($request->amount<0.001){
            $is_clear = false;
            $data["status"] = false;
            $data["error_amount"] = "Amount to withdraw must be at least 0.001";
        }
        if(empty($request->to_address)){
            $is_clear = false;
            $data["status"] = false;
            $data["error_address"] = "You have not entered the address";
        }
        if($is_clear){
            $user = Auth::user();
            $wallet = Wallet_Model::where('users_id',$user->id)->first();
            $address_balance = Helper::api_get("/wallet/get-balance?address=" . $wallet->address);
            $bnb_balance = $address_balance->balance;
            if($request->amount<=$bnb_balance){
                $transactionsBNB = new TransactionsBNB_Model;
                $transactionsBNB->users_id = $user->id;
                $transactionsBNB->wallet_id = $wallet->id;
                $transactionsBNB->to_address = $request->to_address;
                $transactionsBNB->balance = 0;
                $transactionsBNB->amount = $request->amount;
                $transactionsBNB->status = 0;
                if($transactionsBNB->save()){
                    //start call api withdraw
                    $info = Helper::api_post("/token/withdraw-bnb",array(
                        "transactions_bnb_id" => $transactionsBNB->id,
                        "address" => $wallet->address,
                        'privateKey' => $wallet->privatekey,
                        "to_address" => $request->to_address,
                        "amount" => $request->amount,
                        "users_id" => $user->id
                    ));
                    $data["status"] = true;
                    //$data["msg"] = json_encode($info);
                    $data["msg"] = "you have requested to withdraw ".$request->amount." BNB.";
                }
            }else{
                $data["status"] = false;
                $data["msg"] = "Not enough balance.";
            }
        }
        echo json_encode($data);
    }

}
