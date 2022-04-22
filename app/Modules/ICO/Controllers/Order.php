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
use Image;
use TheSeer\Tokenizer\Exception;
use JSON;
use function Couchbase\defaultDecoder;

class Order extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $user = Auth::user();
        $checkWallet = Wallet_Model::where('users_id', $user->id)->first();
        $address = "";
        if (!empty($checkWallet)) {
            $address = $checkWallet->address;
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
        }

        $order = DB::table('order')->where('order.users_id', '=', $user->id)
            ->join('rate', 'rate.id', '=', 'order.rate_id')
            ->join('phase', 'phase.id', '=', 'order.phase_id')
            ->select('phase.name', 'order.created_at', 'order.quantity_token', 'order.quantity_bnb', 'order.status', 'order.id')
            ->orderBy("order.id", "desc");
        $now = DB::table('phase')
            ->select(
                'phase.id',
                'phase.name',
                'phase.end_date',
                'phase.token_number',
                'rate.token',
                'rate.bnb',
                'phase.max_buy',
                'phase.min_buy',
                'phase.price as wta_price'
            )
            ->join('rate', 'rate.phase_id', '=', 'phase.id')
            ->where('phase.status', "=", 1)
            ->where('phase.start_date', "<=", now())
            ->where('phase.end_date', ">=", now())
            ->first();
        //            ->orderBy('phase.start_date','asc')->limit(1)            
        $max_buy_remaining = Order_Model::where("users_id", $user->id)->whereIn("status", [0, 1, 2])->sum('quantity_token');
        $wtabalanceOf_owner = Helper::api_get("/token/balanceOf?address=0xB1A05C9e81b6136035F0A8f59Ef50BAc6b61f0e1")->balance;
        $coming = DB::table('phase')->where('status', "=", 1)->where('start_date', ">", now())
            ->orderBy('start_date', 'asc')->limit(1);
        // for check balance BNB
        $address_balance = Helper::api_get("/wallet/get-balance?address=" . $address);
        $bnb_balance = $address_balance->balance;
        return view("ICO::order.index", compact('address', "order", "now", "bnb_balance", "coming", 'max_buy_remaining','wtabalanceOf_owner'));
    }

    public function buyToken(Request $request)
    {
        $settings = config('global.settings');
        //get fee
        $user = Auth::user();
        $checkWallet = Wallet_Model::where('users_id', $user->id)->first();
        if (!empty($checkWallet)) {
            $now = DB::table('phase')
                ->select(
                    'phase.max_buy',
                    'phase.min_buy',
                    'phase.id as phase_id',
                    'rate.id as rate_id',
                    'phase.price',
                    'phase.bg_point_rate'
                )
                ->join('rate', 'rate.phase_id', '=', 'phase.id')
                ->where('phase.status', "=", 1)
                ->where('phase.start_date', "<=", now())
                ->where('phase.end_date', ">=", now())
                ->first();
            if (!empty($now)) {
                $max_buy_remaining = Order_Model::where("users_id", $user->id)->whereIn("status", [0, 1, 2])->sum('quantity_token');
                $remaining_number = $now->max_buy - $max_buy_remaining;
                $next_remaining_number = $request->token + $max_buy_remaining;
                if ($remaining_number >= $now->min_buy && $next_remaining_number <= $now->max_buy) {
                    $address_balance = Helper::api_get("/wallet/get-balance?address=" . $checkWallet->address);
                    $bnb_balance = $address_balance->balance;
                    //$max_balance_buy = $bnb_balance - $fee_number;
                    //check Max buy or Min By
                    if ($request->token <= $now->max_buy && $request->token >= $now->min_buy) {
                        $order = new Order_Model;
                        $order->users_id = $user->id;
                        $order->wallet_id = $checkWallet->id;
                        $order->rate_id = $now->rate_id;
                        $order->phase_id = $now->phase_id;
                        $order->quantity_token = $request->token;
                        $order->quantity_bnb = 0;
                        $order->status = 0;
                        if ($order->save()) {
                            $data = Helper::api_post("/token/buy", array(
                                "address" => $checkWallet->address,
                                "privateKey" => $checkWallet->privatekey,
                                "balance" => $bnb_balance,
                                "token_number" => $request->token,
                                "price_wta" => $now->price,
                                "order_id" => $order->id,
                                "users_id" => $user->id,
                                "bg_point_number" => $now->bg_point_rate * $request->token,
                                "bg_point_secretkey" => $settings['BGPOINT_API_SECRET_KEY'],
                                "email" => $user->email
                            ));
                            echo json_encode(["status" => true, "title" => "Sent request.", "msg" => "Orders are being processed. " ]); //. json_encode($data)
                        } else {
                            echo json_encode(["status" => false, "title" => "Error.", "msg" => "Unable to execute transaction"]);
                        }
                    } else {
                        echo json_encode(["status" => false, "title" => "Error.", "msg" => "Invalid WTA quantity "]);
                    }
                } else {
                    echo json_encode(["status" => false, "title" => "Error.", "msg" => "You are buy over " . $now->max_buy . " WTA"]);
                }
            } else {
                echo json_encode(["status" => false, "title" => "Error.", "msg" => "No sales going on."]);
            }
        }
    }
    /*
    public function buyToken(Request $request)
    {
        DB::beginTransaction();
        try {
            $msg = "";
            //check order id exists
            $order = DB::table('order')->where('order.id', $request->order_id)->where('order.status', 0)
                ->join('rate', 'rate.id', '=', 'order.rate_id')
                ->join('phase', 'phase.id', '=', 'order.phase_id')
                ->join('wallet', 'wallet.id', '=', 'order.wallet_id')
                ->select(
                    'rate.phase_id',
                    'order.quantity_token',
                    'order.quantity_eth',
                    'order.status',
                    'order.id',
                    'order.rate_id',
                    'order.wallet_id',
                    'wallet.address',
                    'wallet.privatekey',
                    'wallet.token_quantity',
                    'phase.token_remaining'
                );;
            if (!$order->exists()) {
                return response()->json([
                    'status' => 'false',
                    'title' => 'Request illegal',
                    'msg' => 'Order not exist',
                    'type' => 'error'
                ]);
            }
            $order = $order->first();
            DB::table('order')->where('order.id', $request->order_id)
                ->update([
                    'status' => 1,
                    'updated_at' => Carbon::now()
                ]);
            //check phase happenning
            $now = DB::table('phase')->where('id', $order->phase_id)->where('status', "=", 1)
                ->where('start_date', "<=", now())->where('end_date', ">=", now());
            //            dd($now);
            if (!$now->exists()) {
                $msg = $msg . "The event has ended";

                DB::table('transactions')->insert([
                    'quantity_eth' => $order->quantity_eth,
                    'quantity_token' => $order->quantity_token,
                    'type' => 1,
                    'rate_id' => $order->rate_id,
                    'wallet_id' => $order->wallet_id,
                    'order_id' => $order->id,
                    'note' => $msg,
                    'created_at' => Carbon::now()
                ]);
                return response()->json([
                    'status' => 'false',
                    'title' => 'Request illegal',
                    'msg' => 'The event has ended',
                    'type' => 'error'
                ]);
            }
            $now = $now->first();
            //check wallet eth
            $user = Auth::user();
            $wallet = DB::table('wallet')->where('users_id', $user->id)->first();
            $fee = Helper::api_get("/token/get-fee?address=" . $wallet->address);
            $fee = $fee->value;

            $call_api = Helper::api_get("/token/buy?order_id=" . $order->id . "&address=" . $order->address . "&privateKey=" . $order->privatekey . "&balance=" . $order->quantity_eth);
            DB::commit();

            return response()->json([
                'status' => 'true',
                'title' => 'Pending...',
                'msg' => 'Pending, the system is processing the transaction.',
                'type' => "success",
                'timer' => 2000
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }*/
}
