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
use JSON;

class Transaction extends Controller
{

    public function __construct()
    {
        
    }

    public function index(){
        $user = Auth::user();
        $transactions = DB::table('transactions')->where('transactions.type',1)->where('transactions.order_id','!=',NULL)
            ->join('order','order.id','=','transactions.order_id')->where('order.users_id','=',$user->id)
//            ->join('users','users.id','=','order.users_id')
            ->select('order.id','order.status','transactions.quantity_eth','transactions.quantity_token','transactions.hash','transactions.note');
//        dd(var_dump($transactions->first()->hash));
        return view("ICO::transaction.index",compact('transactions'));// compact('address', "eth_balance", "order"));
    }
}
