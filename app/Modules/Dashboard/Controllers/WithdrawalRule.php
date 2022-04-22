<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Modules\Dashboard\Models\Wallet_Model;
use App\Modules\Dashboard\Models\Users_Model;
use App\Modules\Dashboard\Models\WithdrawalRule_Model;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Helpers\Helper;
use Illuminate\Support\Facades\Cookie;

class WithdrawalRule extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $settings = config('global.settings');
        $data = WithdrawalRule_Model::select("withdrawal_rule.*", "users.email", "wallet.address")
            ->leftJoin("users", "users.id", "=", "withdrawal_rule.users_id")
            ->leftJoin("wallet", "wallet.users_id", "=", "withdrawal_rule.users_id")
            ->where("withdrawal_rule_id", "0")
            ->orderBy('withdrawal_rule.id', 'desc')
            ->paginate(15);
        $data->setPath('withdrawalrule');
        $row = json_decode(json_encode([
            "title" => "Withdrawal Rule",
        ]));
        return view("Dashboard::withdrawalrule.index", compact("row", "data", "settings"));
    }

    public function edit($id = 0)
    {
        $settings = config('global.settings');
        $data = WithdrawalRule_Model::select("withdrawal_rule.*", "users.email", "wallet.address")
        ->leftJoin("users", "users.id", "=", "withdrawal_rule.users_id")
        ->leftJoin("wallet", "wallet.users_id", "=", "withdrawal_rule.users_id")
        ->where("withdrawal_rule.id", $id)->first();
        $list_locktime = WithdrawalRule_Model::where("users_id",$data->users_id)
        ->where("withdrawal_rule_id",">",0)
        ->orderBy("sort","asc")
        ->get();
        $row = json_decode(json_encode([
            "title" => "Withdrawal Rule",
            "desc" => "Edit",
        ]));
        return view("Dashboard::withdrawalrule.edit", compact("row", "data","list_locktime", "settings"));
    }

    public function postEdit(Request $request, $id = 0) {
        //save edit
        if(isset($_POST["btn_update"])){
            $withdrawalRule = WithdrawalRule_Model::find($id);
            $withdrawalRule->total_locked = $request->total_locked;
            if($withdrawalRule->save()){
                return back()->with(["type" => "success", "flash_message" => "Saves change success!"]);    
            }else{
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Error, please try again."]);    
            }
        }
        if(isset($_POST["btn_add"])){
            $withdrawal_detail = WithdrawalRule_Model::find($id);
            $withdrawalRule = new WithdrawalRule_Model;
            $withdrawalRule->withdrawal_rule_id = $id;
            $withdrawalRule->users_id = $withdrawal_detail->users_id;
            $withdrawalRule->start_date = $request->start_date;
            $withdrawalRule->end_date = $request->end_date;
            $withdrawalRule->percent_amount = $request->percent_amount;
            $withdrawalRule->sort = $request->sort;
            if($withdrawalRule->save()){
                return back()->with(["type" => "success", "flash_message" => "Added success!"]);    
            }else{
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Error, please try again."]);    
            }
        }
        /*
        if ($wallet->save()) {
            return back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }*/
    }

    public function add()
    {
        $settings = config('global.settings');
        $list_users = Users_Model::select("id", "email")->where("kyc_status", 1)->get();
        $row = json_decode(json_encode([
            "title" => "Withdrawal Rule",
            "desc" => "Add New",
        ]));
        return view("Dashboard::withdrawalrule.add", compact("row", "settings", "list_users"));
    }

    public function postAdd(Request $request)
    {
        $settings = config('global.settings');
        $this->validate($request, ["users_id" => "required", "total_locked" => "required"], ["users_id.required" => "Please select an users email", "total_locked.required" => "Please enter total for lock"]);
        $withdrawalRule = new WithdrawalRule_Model;
        if (!empty($request->users_id) && $request->users_id > 0) {
            $withdrawalRule->users_id = $request->users_id;
            $withdrawalRule->total_locked = $request->total_locked;
            if ($withdrawalRule->save()) {
                return back()->with(["type" => "success", "flash_message" => "Add success!"]);
            } else {
                return back()->withInput()->with(["type" => "danger", "flash_message" => "Error, please try again."]);
            }
        }else{
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Please select an users email."]);
        }
    }


}
