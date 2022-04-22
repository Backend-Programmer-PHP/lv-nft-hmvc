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
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
//use function Illuminate\Support\Facades\View;
use App\Modules\ICO\Helpers\Helper;
use Illuminate\Support\Facades\File;

class Account extends Controller
{

    public function __construct()
    {
        //if (Auth::guard("web")->check()) {
//            return redirect()->route("ico.home.login");
        //      }
    }

    public function index(Request $request){
            $user = Auth::user();
            $referral = DB::table('referral')->where('referral_user_id', $user->id)->get();

            $Registered = count($referral);
//        $Active = count($referral->where('active_referral',1));
//        $Incentives = count($referral->where('active_referral',0));
            $settings = config('global.settings');
            $secret_key = $settings['BGPOINT_API_SECRET_KEY'];

            $users = DB::table('referral')
                ->where('referral.referral_user_id', $user->id)
                ->join('users', 'users.id', 'referral.user_id')
                ->leftJoin('airdrop', 'airdrop.id', 'referral.airdrop_id')
                ->select('email', 'user_id', 'airdrop.referral_value', 'referral.kyc', 'referral.status', 'referral.airdrop_id')
                ->paginate(2);
            $bonus_value = DB::table('bonus')->where('bonus.users_id', $user->id)
                ->join('airdrop', 'bonus.airdrop_id', 'airdrop.id')
                ->sum('airdrop.bonus_value');
            $referral_value = DB::table('referral')
                ->where('referral.referral_user_id', $user->id)
                ->where('referral.status', 1)
                ->where('referral.kyc', 1)
                ->join('airdrop', 'referral.airdrop_id', 'airdrop.id')
                ->sum('airdrop.referral_value');

        return view("ICO::account.index" ,compact('Registered','users','user','secret_key','bonus_value','referral_value'));
    }

    function pagination(Request $request)
    {
        if($request->ajax())
        {
            $user = Auth::user();
            $users = DB::table('referral')
                ->where('referral.referral_user_id', $user->id)
                ->join('users', 'users.id', 'referral.user_id')
                ->leftJoin('airdrop', 'airdrop.id', 'referral.airdrop_id')
                ->select('email', 'user_id', 'airdrop.referral_value', 'referral.kyc', 'referral.status', 'referral.airdrop_id')
                ->paginate(2);
            return view('ICO::account.paginate', compact('users'));
        }
    }
    public function show2faForm(Request $request){
        $user = Auth::user();

        $google2fa_url = "";
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        if(empty($user->google2fa_secret)){
            $secret = $googleAuthenticator->createSecret();
            $user->google2fa_secret = $secret;
            $user->save();
        }
        $secret = $user->google2fa_secret;
        $google2fa_url = $googleAuthenticator->getQRCodeGoogleUrl(
            'WTA',
            $secret,
            $user->email
        );
        $secret_code = $googleAuthenticator->getCode($secret);
//        dd();
        //session(["secret_code" => $user->google2fa_secret]);
        $data = [
            'user' => $user,
            'google2fa_url' =>$google2fa_url
        ];

        return \view('ICO::security.2fa',compact("user","google2fa_url","secret"));
    }

    public function enable2fa(Request $request){
        // Validate dữ liệu gửi lên
        $validator=$this->validate($request, [
            "verify-code" => "required|digits:6"
        ]);
        $user = Auth::user();
        // Initialise the 2FA class
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = $user->google2fa_secret;
        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("verify-code"), 1)) {
            return redirect()->route('ico.security.2fa')->with('error',"Invalid Verification Code, Please try again.");

        }
        // Add the secret key to the registration data
        $email = $user->email;
        $user->google2fa_enable = 1;
        $user->save();
        session(["2fa_verified" => true]);
        Mail::send('ICO::email.enable2fa', [
            'email'=>$email,
            'time'=>Carbon::now()->toDateTimeString()
        ], function($message) use ($email) {
            $message->from('leanhkhoa832021@gmail.com', 'Womentech');
            $message->to($email)
                ->subject('Notifications Enable two-factor authentication.');
        });

        $request->session()->flush();
        Auth::guard("web")->logout();
        session(["2fa_verified" => false]);

        return redirect()->route('ico.users.login')->with(["type" => "success", "flash_message" => "2FA Enable success! . Please login again"]);
    }

    public function disable2fa(Request $request){
        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your password does not matches with your account password. Please try again.");
        }

        session(["2fa_verified" => false]);

        $user = Auth::user();
        $user->google2fa_enable = 0;
        $user->google2fa_secret = null;
        $user->save();
        return redirect()->route('ico.account.index')->with('success',"2FA is now Disabled.");
    }

    public function getChangePassword(){
        $user = Auth::user();

        return \view("ICO::account.password",compact("user"));
    }
    public function postChangePassword(Request $request){
        $user = Auth::user();
        DB::beginTransaction();
        try {
            if($request->has('google_verification')){
                $validator=$this->validate($request, [
                    "old_password" => "bail|required",
                    "new_password" => "bail|required",
                    "password_confirm" => "bail|required",
                    "google_verification"=>"bail|required"
                ]);
            }
            else{
                $validator=$this->validate($request, [
                    "old_password" => "bail|required",
                    "new_password" => "bail|required",
                    "password_confirm" => "bail|required",
                ]);
            }
            if($request->get('new_password')!= $request->get('password_confirm')){
                throw new \Exception("Your password does not matches with your password confirm.",1);
            }
            if($request->get('new_password') == $request->get('old_password')){
                throw new \Exception("Your new password matches with your current password.",3);
            }
            if (!(Hash::check($request->get('old_password'), $user->password))) {
                throw new \Exception("Current password incorrect.",0);

            }
            if($request->has('google_verification')){
                $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
                $secretCode = $user->google2fa_secret;
                if (!$googleAuthenticator->verifyCode($secretCode, $request->get("google_verification"), 1)) {
                    throw new \Exception("Invalid authentication code.",2);
                }
            }
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            $email = $user->email;
            Mail::send('ICO::email.notificationchangepassword', [
                'name'=>$request->name,
                'email'=>$request->email,
                'time'=>Carbon::now()->toDateTimeString()
            ], function($message) use ($email) {
                $message->from('leanhkhoa832021@gmail.com', 'Womentech');
                $message->to($email)
                    ->subject('Notifications Change Account');
            });
            DB::commit();
            $request->session()->flush();
            Auth::guard("web")->logout();
            session(["2fa_verified" => false]);
            return redirect()->route('ico.users.login')->with(["type" => "success", "flash_message" => "Change password successfully!.Please login again"]);
        }
        catch (ValidationException $exception){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($exception->errors());

        }
        catch (\Throwable $throwable){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($throwable->getCode().$throwable->getMessage());

        }
    }

    public function postUpdate(Request $request){
        $user = Auth::user();
        try {
            $validator = $this->validate($request, [
                "fullname" => "bail|required",
            ]);

            if($request->has('image_photo')){
                $rules = array(
                    'image' => 'image|mimes:jpeg,JPEG,jpg,JPG,png,PNG|max:2048|required' // max 10000kb
                );
                $validator = $this->validate($request,
                    [
                        'image_photo' => $rules['image'],
                    ]
                );

                if ($user->photo != null) {
                    File::delete(public_path($user->photo));
                }

                $img_face = $request->file('image_photo');
                $path_face = ('upload/images/users/images_photo');
                $file_path_face = Helper::saveImageToPublic($img_face, $path_face);
                DB::table('users')->where('id', $user->id)->update([
                    'fullname' => $request->fullname,
                    'photo'=>$file_path_face['path'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->with(["type" => "success", "flash_message" => "Update successfully!"]);

            }

            DB::table('users')->where('id', $user->id)->update([
                'fullname' => $request->fullname,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->back()->with(["type" => "success", "flash_message" => "Update successfully!."]);

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($throwable->getCode().$throwable->getMessage());
        }

    }

    public function check_kyc(Request $request){
        if($request->status){
            $user = Auth::user();
            //update table users kyc_status
            DB::table('users')->where('id',$user->id)->update([
                'kyc_status'=>1,
                'updated_at'=>Carbon::now()
            ]);

            //check airdrop now
            $airdrop = DB::table('airdrop')->where('start_date','<=',now())->where('end_date','>=',now())->where('status',1);
            if($airdrop->exists()){
                $airdrop = $airdrop->first();
                //check airdrop total
                $check_bonus = Helper::check_total_airdrop($airdrop,0); //0: check bonus
                if($check_bonus)
                {
                    //insert table bonus
                    DB::table('bonus')->insert([
                        'users_id'=>$user->id,
                        'airdrop_id'=>$airdrop->id,
                        'created_at'=>Carbon::now()
                    ]);
                    //update table airdrop sub total - bonus
                    DB::table('airdrop')->where('id',$airdrop->id)->update([
                        'total'=>$airdrop->total - $airdrop->bonus_value,
                        'updated_at'=>Carbon::now()
                    ]);
                    //insert table airdrop_history type 0
                    DB::table('airdrop_history')->insert([
                       'users_id'=>$user->id,
                        'airdrop_id'=>$airdrop->id,
                        'note'=>'Cong '.$airdrop->bonus_value .' WTA bonus',
                        'type'=>0,
                        'created_at'=>Carbon::now()
                    ]);

                }
                else{
                    return redirect()->route('ico.account.index')->with(["type" => "success", "flash_message" => "Identity Verification successfully!."]);
                }
                //check airdrop now
                $airdrop_after = DB::table('airdrop')->where('start_date','<=',now())->where('end_date','>=',now())->where('status',1);
                $referral = DB::table('referral')->where('user_id',$user->id);
                if($referral->exists()){
                    $check_ref = Helper::check_total_airdrop($airdrop,1);//1 check referral value
                    $airdrop_after = $airdrop_after->first();
                    //khong du referral_value de tang
                    if(!$check_ref){
                        //update table referral kyc =1
                        DB::table('referral')->where('id',$referral->first()->id)->update([
                            'kyc'=>1,
                            'airdrop_id'=>$airdrop_after->id,
                            'updated_at'=>Carbon::now()
                        ]);
                    }
                    else{
                        //update table referral kyc =1, status = 1
                        DB::table('referral')->where('id',$referral->first()->id)->update([
                            'kyc'=>1,
                            'status'=>1,
                            'airdrop_id'=>$airdrop_after->id,
                            'updated_at'=>Carbon::now()
                        ]);
                        //update table airdrop sub total - referral
                        DB::table('airdrop')->where('id',$airdrop_after->id)->update([
                            'total'=>$airdrop_after->total - $airdrop_after->referral_value,
                            'updated_at'=>Carbon::now()
                        ]);
                        //insert table airdrop_history type 1
                        DB::table('airdrop_history')->insert([
                            'users_id'=>$referral->first()->referral_user_id,
                            'airdrop_id'=>$airdrop_after->id,
                            'note'=>'Cong '.$airdrop_after->referral_value .' WTA referral',
                            'type'=>1,
                            'created_at'=>Carbon::now()
                        ]);
                    }
                }
            }

            return redirect()->route('ico.account.index')->with(["type" => "success", "flash_message" => "Identity Verification successfully!."]);
        }
    }
    public function showAuthencation(){
        return \view("ICO::page.2fa");
    }
}
