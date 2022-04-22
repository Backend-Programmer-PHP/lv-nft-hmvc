<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Welcome_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Modules\API\Jobs\SendMail;
use App\Modules\API\Jobs\TestQueue;
use Illuminate\Support\Facades\Redis;
use App\Modules\API\Models\Ask_Model;

class Welcome extends Controller
{

    public function index()
    {
        $sliders = Welcome_Model::where("status", 1)->orderBy("sort", "asc")->get();
        $data = array();
        foreach ($sliders as $value) {
            array_push($data, [
                "id" => $value->id,
                "title" => $value->title,
                "images" =>  "https://api.onicorn.vn/public/upload/images/welcome/large/" . $value->images
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $data,
            "msg" => "Query successful"
        ]);
    }

    public function test()
    {
        
        $email = "ngodinhluan1@gmail.com";
        Mail::send('API::email.verify', [
            'email' => $email,
            'confirmation_code' => "code123521" //$confirmation_code
        ], function ($message) use ($email) {
            $message->from('noreply@visithcmc.vn', 'Test');
            $message->to($email)
                ->subject('Verify your email address');
        });
        
        //SendMail::dispatch("ngodinhluan1@gmail.com",'Verify your email address')->onQueue('processing');
        //SendMail::dispatch("yegane7922@vinopub.com",'Verify your email address')->onQueue('processing');
        //dispatch(new SendMail("ngodinhluan1@gmail.com",'Verify your email address'));
        //dispatch(new SendMail("yegane7922@vinopub.com",'Verify your email address'));

        //dispatch(new TestQueue());
        //TestQueue::dispatch()->afterCommit();
        /*
        $ask = new Ask_Model;
        $ask->users_id =1;
        $ask->message ="ngoluan";
        $ask->language_id =1;
        $ask->status =1;
        

        dispatch(function () use ($ask) {
            $ask->save();
        });
        */

        /*
        $ask = new Ask_Model;
        $ask->users_id =1;
        $ask->message ="ngoluan";
        $ask->language_id =1;
        $ask->status =1;
        $ask->save();*/

        //$connection = null;
        //$default = 'default';
        return response()->json([
            "status" => true,
            "msg" => "send mail",
            "debug" => Redis::connection(), //var_dump(Queue::getRedis()->connection($connection)->zrange('queues:'.$default.':delayed' ,0, -1) )
        ]);
    }
}
