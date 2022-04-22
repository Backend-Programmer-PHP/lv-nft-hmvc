<?php

namespace App\Modules\ICO\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Modules\ICO\Models\Users_Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;
use App\Modules\ICO\Helpers\Helper;

class Users extends Controller
{

    public function __construct()
    {

    }

    public function login()
    {
        if (Auth::guard("web")->check()) {
            return redirect()->route("ico.dashboard.index");
        }
        return view("ICO::users.login");
    }

    public function logoutDevices()
    {
        return view("ICO::page.logout");
    }

    protected function authenticated()
    {
        Auth::logoutOtherDevices(key('password'));
    }

    public function Postlogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required",
        ]);
        $auth = array(
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        );
        $remember = $request->remember;
        $user = Users_Model::where('email', $request->email);
        if ($user->exists()) {
            if (!$user->first()->status) {
                return redirect(route('ico.users.login'))->withInput()
                    ->with(["type" => "warning", "flash_message" => "User not confirmed. 
                    Please check your email and follow the provided link to confirm your email address before login in.", "data-time" => $user->first()->email_confirmed,
                        "href" => "/re-register.html"]);
            }
        }
        if (!Auth::guard("web")->attempt($auth, $remember)) {
            return redirect(route('ico.users.login'))->withInput()
                ->with(["type" => "warning", "flash_message" => "Email or password incorrect !"]);
        }
        //check ip client
        if(empty($user->first()->ip)){
            $ip_address =Helper::getIpClient();
            $user->update([
                'ip'=>$ip_address,
                'updated_at'=>Carbon::now()
            ]);
        }
        //check ref code exists
        if(!$user->first()->referral_code){
            $random_str =Helper::getRandomString(5);
            $ref_code = 'WTA'.$user->first()->id .$random_str;
            $user->update([
                'referral_code'=>$ref_code,
                'updated_at'=>Carbon::now()
            ]);
        }
        //check account bg point exists
        if(!$user->first()->token_bgpoint){
            $result = Helper::api_bgPoint_register($user->first()->email);
            $user->update([
                'token_bgpoint'=>$result['token'],
                'updated_at'=>Carbon::now()
            ]);
        }
        Auth::logoutOtherDevices($request->password);

        return redirect()->route("ico.dashboard.index");
    }

    public function logout(Request $request)
    {
        Auth::guard("web")->logout();
        $request->session()->flush();
        session(["2fa_verified" => false]);
        if (!Auth::guard("web")->check()) {
            return redirect()->route("ico.users.login");
        }
    }

    public function getRegister()
    {
        return view("ICO::users.register");
    }
    public function getRegisterCode()
    {
        return view("ICO::users.registerCode");
    }
    public function postRegister(Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = $this->validate($request, [
                "email" => "bail|required|unique:users",
                "password" => "bail|required|min:6|max:255",
                "password_confirm" => "bail|required|min:6|max:255",

            ]);
            $email = $request->email;
            $user = Users_Model::where('email', $email);
            if ($user->exists()) {
                throw new \Exception("Email already exists. Please try again.");
            }
            if ($request->password != $request->password_confirm) {
                throw new \Exception("Passwords do not match!");
            }
            $confirmation_code = time() . "-" . (time() + (60 * 10));
            $ip_address =Helper::getIpClient();

            $user->create([
                'email' => $email,
                'password' => bcrypt($request->password),
                'gender' => 0,
                'remember_token' => "",
                'status' => 0,
                'type' => 1,
                'ip'=>$ip_address,
                'email_confirmed' => $confirmation_code,
            ]);

            Mail::send('ICO::email.verify', [
                'email' => $request->email,
                'confirmation_code' => $confirmation_code
            ], function ($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Verify your email address');
            });

            DB::commit();
            return redirect()->route('ico.users.notify_register')->withInput()
                ->with(['type' => 'success', 'email' => $email, 'confirmation_code' => $confirmation_code]);
        } catch (ValidationException $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($exception->errors());

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($throwable->getMessage());
        }
    }
    public function postCodeRegister($code,Request $request)
    {

        DB::beginTransaction();
        try {
            $validator = $this->validate($request, [
                "email" => "bail|required|unique:users",
                "password" => "bail|required|min:6|max:255",
                "password_confirm" => "bail|required|min:6|max:255",

            ]);

            $email = $request->email;
            $user = Users_Model::where('email', $email);

            if ($user->exists()) {
                throw new \Exception("Email already exists. Please try again.");
            }
            if ($request->password != $request->password_confirm) {
                throw new \Exception("Passwords do not match!");
            }
            $referral_user_id = DB::table('users')->where('referral_code',$code);
            if(!$referral_user_id->exists()){
                throw new \Exception("Request illegal!");
            }

            $confirmation_code = time() . "-" . (time() + (60 * 10));
            $ip_address =Helper::getIpClient();

            $user->create([
                'email' => $email,
                'password' => bcrypt($request->password),
                'gender' => 0,
                'remember_token' => "",
                'status' => 0,
                'type' => 1,
                'ip'=>$ip_address,
                'email_confirmed' => $confirmation_code,
            ]);
            $air_drop = DB::table('airdrop')
                ->where('start_date','<=',now())
                ->where('end_date','>=',now())
                ->where('status',1);
            if($air_drop->exists()){
                DB::table('referral')->insert([
                    'user_id'=>$user->first()->id,
                    'referral_user_id'=>$referral_user_id->first()->id,
                    'airdrop_id'=>$air_drop->first()->id,
                    'created_at'=>Carbon::now()
                ]);
            }else{
                DB::table('referral')->insert([
                    'user_id'=>$user->first()->id,
                    'referral_user_id'=>$referral_user_id->first()->id,
                    'created_at'=>Carbon::now()
                ]);
            }

            Mail::send('ICO::email.verify', [
                'email' => $request->email,
                'confirmation_code' => $confirmation_code
            ], function ($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Verify your email address');
            });
            DB::commit();

            return redirect()->route('ico.users.notify_register')->withInput()
                ->with(['type' => 'success', 'email' => $email, 'confirmation_code' => $confirmation_code]);
        } catch (ValidationException $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($exception->errors());

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($throwable->getMessage());
        }
    }

    public function notifyRegister()
    {
        return view("ICO::page.registernotify");
    }

    public function rePostRegister(Request $request)
    {
        if ($request->ajax()) {
            $data_time = $request->time;
            if($data_time == null){
                return response()->json([
                    'status' => 'false',
                    'msg' => 'Request illegal'
                ]);
            }
            $user = Users_Model::where('email_confirmed', $data_time);
            if (!$user->exists()) {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'Request illegal '
                ]);
            }

            $timeend = strstr($data_time, "-");
            $timeend = substr($timeend, 1);
            if ($timeend > time()) {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'Please check your email address.'
                ]);
            }

            $confirmation_code = time() . "-" . (time() + (60 * 10));
            $email = $user->first()->email;
            $user->update([
                'email_confirmed' => $confirmation_code
            ]);
            Mail::send('ICO::email.verify', [
                'name' => $request->name,
                'email' => $request->email,
                'confirmation_code' => $confirmation_code
            ], function ($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Verify your email address');
            });
            return response()->json([
                'status' => 'true',
                'msg' => 'Please verify your email address.',
            ]);
        }
        else {
            $data_time = $request->get('data-time');
            if($data_time == null){
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => "Request illegal!"]);
            }
            $user = Users_Model::where('email_confirmed', $data_time);
            if (!$user->exists()) {
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => "Request illegal!"]);

            }
            $timeend = strstr($data_time, "-");
            $timeend = substr($timeend, 1);
            if ($timeend > time()) {
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => "Please check your email address.!"]);
            }

            $confirmation_code = time() . "-" . (time() + (60 * 10));
            $email = $user->first()->email;
            $user->update([
                'email_confirmed' => $confirmation_code
            ]);
            Mail::send('ICO::email.verify', [
                'name' => $request->name,
                'email' => $request->email,
                'confirmation_code' => $confirmation_code
            ], function ($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Verify your email address');
            });
            return redirect()->route('ico.users.login')->with(['type'=>'success','flash_message'=>'Please verify your email address.']);
        }
    }

    public function verify($code)
    {
        DB::beginTransaction();
        try {
            $timeend = strstr($code, "-");
            $timeend = substr($timeend, 1);

//            $user = Users_Model::where('email_confirmed', $code);
            $user = DB::table('users')->where('email_confirmed',$code);
            if (!$user->exists()) {
                throw new \Exception("Your code incorrect. Please try again.");
            }
            $timedb = strstr($user->first()->email_confirmed, "-");
            $timedb = substr($timedb, 1);

            if ($timedb < time()) {
                throw new \Exception("Your code expired. Please try again.");
            }

            $result = Helper::api_bgPoint_register($user->first()->email);
            $user->update([
                'status' => 1,
                'token_bgpoint'=>$result['token']
            ]);
            DB::commit();
            Helper::api_post_notification("/add", array(
                "users_id"=>$user->first()->id,
                "note"=>"You have completed the account registration, to participate in the activities you must perform KYC and enable 2FA to secure the account. Womentech Team.",
                "title"=>"Welcome to WomenTech",
                "url"=>"/overview.html"
            ));
            return redirect(route('ico.users.login'))->withInput()
                ->with(["type" => "success", "flash_message" => "Account verification successful!"]);

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return view('ICO::page.404');
        }
    }

    public function getforgotPassword()
    {
        return view("ICO::users.forgotPassword");
    }

    public function postforgotPassword(Request $request)
    {
        DB::beginTransaction();

        try {
            $password_reset = time() . "-" . (time() + (60 * 2));
            $email = $request->email;
            $user = Users_Model::where('email', $email);
            if (!$user->exists()) {
                throw new \Exception("Email does not exist. Please try again.");
            }

            $user->update([
                'password_reset' => $password_reset
            ]);
            Mail::send('ICO::email.resetPassword', [
                'email' => $request->email,
                'password_reset' => $password_reset
            ], function ($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Reset password');
            });
            DB::commit();
            return redirect(route('ico.users.login'))->withInput()
                ->with(["type" => "success", "flash_message" => "Please check your email address.!"]);
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->withErrors($throwable->getMessage());
        }

    }

    public function getResetPassword($code)
    {

        return view("ICO::users.resetPassword");
    }

    public function postResetPassword($code, Request $request)
    {
        if ($request->password != $request->password_confirm) {
            return redirect()->back()->withInput()
                ->with(["type" => "danger", "flash_message" => "password incorrect!"]);
        }

        $user = Users_Model::where('password_reset', $code);

        if (!$user->exists()) {
            return redirect()->back()->withInput()
                ->with(["type" => "warning", "flash_message" => "Request illegal!"]);
        }
        $timedb = strstr($user->first()->password_reset, "-");
        $timedb = substr($timedb, 1);

        if ($timedb < time()) {
            return redirect()->back()->withInput()
                ->with(["type" => "warning", "flash_message" => "Link has expired!"]);
        }
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route("ico.users.login")->withInput()->with(["type" => "success", "flash_message" => "Password update successful!"]);
    }

    public function index()
    {
        $user = Auth::user();
        return view('ICO::profile.index', compact("user"));
    }
    public function show(){

        return view("ICO::profile.show");
    }

    public function postUpdate(Request $request){
        $user = Auth::user();

        try {
            $validator = $this->validate($request, [
                "name" => "bail|required",
            ]);

            $user->fullname = $request->name;
            if($request->has('image')){
                $rules = array(
                    'image' => 'image|mimes:jpeg,JPEG,jpg,JPG,png,PNG|max:2048|required' // max 10000kb
                );
                $validator = $this->validate($request,
                    [
                        'image' => $rules['image'],
                    ]
                );
                if ($user->photo != null) {
                    File::delete(public_path($user->img_face_camera));
                }
                $img_face = $request->file('img_face');
                $path_face = ('upload/images/users/images_face');
                $file_path_face = Helper::saveImageToPublic($request->file('img_face'), $path_face);
                $user->photo = $file_path_face['path'];
            }
            $user->save();
            return response()->json([
                'status'=>'true',
                'msg'=>'Updated successful !'
            ]);

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return response()->json([
                'status'=>'false',
                'msg'=>$throwable->getMessage()
            ]);
        }

    }
}
