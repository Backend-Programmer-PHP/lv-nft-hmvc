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
use function Illuminate\Support\Facades\View;

class Security extends Controller
{
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
        //session(["secret_code" => $user->google2fa_secret]);
        $data = [
            'user' => $user,
            'google2fa_url' =>$google2fa_url
        ];

        return \view('ICO::security.2fa',compact("user","google2fa_url"));
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
        return redirect()->route('ico.security.index')->with('success',"2FA is now Disabled.");
    }

    public function index()
    {
        $user = Auth::user();
        return \view("ICO::security.index",compact("user"));
    }
    public function show2fa()
    {
        $user = Auth::user();
        return \view("ICO::security.2faverify");
    }


    public function verify(Request $request)
    {
        $this->validate($request, [
            "code" => "required|digits:6",
        ]);

        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = auth()->user()->google2fa_secret;
        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 1)) {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add("code", "Invalid authentication code");
            return redirect()->back()->withErrors($errors);
        }

        session(["2fa_verified" => true]);
        return redirect()->route('ico.dashboard.index');
    }

    public function getChangePassword(){
        $user = Auth::user();

        return \view("ICO::security.password",compact("user"));

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
                throw new \Exception("Your password does not matches with your password confirm. Please try again.",1);
            }
            if($request->get('new_password') == $request->get('old_password')){
                throw new \Exception("Your new password matches with your old password. Please try again.",3);
            }
            if (!(Hash::check($request->get('old_password'), $user->password))) {
                throw new \Exception("Your old password incorrect. Please try again.",0);

            }
            if($request->has('google_verification')){
                $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
                $secretCode = $user->google2fa_secret;
                if (!$googleAuthenticator->verifyCode($secretCode, $request->get("google_verification"), 1)) {
                    throw new \Exception("Invalid authentication code. Please try again.",2);
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
     public function showAuthencation(){
        return \view("ICO::page.2fa");
     }
}
