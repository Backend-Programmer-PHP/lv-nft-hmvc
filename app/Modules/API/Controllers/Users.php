<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API\Models\Users_Model;
use App\Modules\API\Models\Language_Model;
use App\Modules\API\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Users extends Controller
{

    //get table 2 information : users , wallets
    public function linkwallet(Request $request)
    {
        
        $validator = Validator::make(
            $request->all(), [
                "address" => "required",
            ], 
        );
        if($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::select("users.email" , "users.name" , "users.photo" , 
                                    "users.website" , "users.custom_url", "users.bio" ,"users.banner","wallets.chain","wallets.network")
        ->leftJoin('wallets', "wallets.users_id", "=", "users.id")->where("address", $request->address)->where("users.status", 1)
            ->get();
        return response()->json([
            'status' => true,
            "data" => $users
        ]);

    } 
    public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                "email" =>"required|email|max:50|unique:users",
                "wallet_account" =>"required",
                "bio" =>"required|nullable",
                "photo" =>"required|nullable",
                "website" =>"required|nullable",
            ],
            [
                "email.required" => "Email is required",
                "email.max" => "Your email address is too long",
                "email.email" => "Your email is not valid",
                'email.unique'  => "This email is already registered",
                'wallet_account.required'  => "wallet_account is required",
                
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = new Users_Model;
        $users->wallet_account = $request->wallet_account;
        $users->email = $request->email;
        $users->fullname = $request->fullname;
        $users->bio = $request->bio;
        $users->status = 1;
        $users->ip = Helper::getIpClient();        
        $users->save();
    }

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "username" => "required|min:4|max:20",
                "email" =>
                "required|email|max:50|unique:users",
                "password" => "required|min:6",
                "password_confirm" => "required|same:password"
            ],
            [
                "username.required" => $request->language == "vi" ? "Vui lòng nhập Họ & Tên" : "Name is required",
                "username.min" => $request->language == "vi" ? "Họ & Tên ít nhất 4 ký tự" : "Name must be at least 4 characters",
                "username.max" => $request->language == "vi" ? "Họ & Tên tối đa 20 ký tự" : "Name maximum 20 characters",
                "email.required" => $request->language == "vi" ? "Vui lòng nhập email" : "Email is required",
                "email.max" => $request->language == "vi" ? "Email quá dài và không hợp lệ" : "Your email address is too long",
                "email.email" => $request->language == "vi" ? "Email không đúng định dạng" : "Your email is not valid",
                "password.required" => $request->language == "vi" ? 'Vui lòng nhập mật khẩu' : "Password is required",
                "password.min" => $request->language == "vi" ? "Mật khẩu ít nhất 6 ký tự" : "Password must be at least 6 characters",
                "password_confirm.required" => $request->language == "vi" ? "Vui lòng nhập lại mật khẩu" : "Password confirm is required",
                'email.unique'  => $request->language == "vi" ? "Email này đã được đăng ký." : "This email is already registered",
                "password_confirm.same" => $request->language == "vi" ? "Nhập lại mật khẩu không đúng" : "Confirmation password does not match",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }

        $users = new Users_Model;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->ip = Helper::getIpClient(); // 0 is normal, 1 is dev
        $users->fullname = "";
        $users->gender = 1;
        $users->status = 1;
        if ($users->save()) {
            $email = $request->email;
            if ($request->language == "vi") {
                Mail::send($request->language == "vi" ? 'API::email.verify_vi' : "API::email.verify_en", [
                    'email' => $email,
                    //'confirmation_code' => "code123521" //$confirmation_code
                ], function ($message) use ($email) {
                    $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
                    $message->to($email)->subject("Đăng ký tài khoản thành công");
                });
            } else {
                Mail::send($request->language == "vi" ? 'API::email.verify_vi' : "API::email.verify_en", [
                    'email' => $email,
                    //'confirmation_code' => "code123521" //$confirmation_code
                ], function ($message) use ($email) {
                    $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
                    $message->to($email)->subject("Successful account registration");
                });
            }
            return response()->json([
                "status" => true,
                "msg" => $request->language == "vi" ? "Đăng ký tài khoản thành công" : "Successful account registration"
            ]);
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "password" => "required",
                "language" => "required"
            ],
            [
                "email.required" => $request->language == "vi" ? 'Vui lòng nhập email' : "Email is required",
                "email.email" => $request->language == "vi" ? "Email không đúng định dạng" : "Your email is not valid",
                "password.required" => $request->language == "vi" ? "Vui lòng nhập mật khẩu" : "Password is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $language = Language_Model::where('lang_code', $request->language)->first();
        if (Auth::guard("web")->attempt(['email' => $request->email, 'password' => $request->password, "status" => 1])) {

            $user = Auth::guard("web")->user();
            return response()->json([
                'status' => true,
                "msg" => "Logged in successfully",
                "data" => [
                    //"id" => $user->id,
                    "username" => $user->username,
                    "email" => $user->email,
                    "photo" => !empty($user->photo) ? "https://api.onicorn.vn/public/upload/images/users/thumb/" . $user->photo : ""
                ]
            ]);
        } else {
            return response()->json([
                'status' => false,
                "msg" => $language->lang_code == 'en' ? 'The email or password is incorrect or your account has been blocked.'
                    : "Email hoặc mật khẩu không chính xác hoặc tài khoản của bạn đã bị khóa."
            ]);
        }
    }

    public function info(Request $request)
    {
        $users = Users_Model::where("email", $request->email)->where("status", 1)->first();
        return response()->json([
            'status' => true,
            "data" => $users
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "username" => "required|min:4|max:20",
            ],
            [
                "username.required" => $request->language == "vi" ? "Vui lòng nhập Họ & Tên" : "Name is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        Users_Model::where("email", $request->email)
            ->update(['username' => $request->username]);
        return response()->json([
            'status' => true,
            "data" => $request->language == "vi" ? "Cập nhật thành công" : "Update successful"
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $settings = config('global.settings');
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required",
                "photo" => "required",
                "language" => "required",
            ],
            [
                "photo.required" => $request->language == "vi" ? "Vui lòng chọn hình ảnh" : "Photo is required",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::where("email", $request->email)->first();
        if ($request->hasFile('photo')) {
            //delete if exist
            $image = str_replace("\\", "/", base_path()) . '/public/upload/images/users/large/' . $users->photo;
            if (file_exists($image)) {
                File::delete($image);
            }
            $image_thumb = str_replace("\\", "/", base_path()) . '/public/upload/images/users/thumb/' . $users->photo;
            if (file_exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $file = $request->photo;
            $file_name = Str::slug(explode(".", $file->getClientOriginalName())[0], "-") . "-" . time() . "." . $file->getClientOriginalExtension();
            //resize file befor to upload large
            if ($file->getClientOriginalExtension() != "svg") {
                $image_resize = Image::make($file->getRealPath());
                $thumb_size = json_decode($settings["THUMB_SIZE_USERS"]);
                $image_resize->fit($thumb_size->width, $thumb_size->height);
                $image_resize->save('public/upload/images/users/thumb/' . $file_name);
            }
            $file->move("public/upload/images/users/large", $file_name);
            Users_Model::where("email", $request->email)->update(['photo' => $file_name]);

            return response()->json([
                "status" => true,
                "msg" => $request->language == "vi" ? "Cập nhật thành công" : "Update successful",
                "data" => "https://api.onicorn.vn/public/upload/images/users/thumb/" . $file_name
            ]);
        }
    }

    public function forgotPassword_SendMail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "language" => "required",
            ],
            [
                "email.required" => $request->language == "vi" ? "Vui lòng nhập email" : "Email is required",
                "email.email" => $request->language == "vi" ? "Email không đúng định dạng" : "Your email is not valid",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::where("email", $request->email)->first();
        if (empty($users)) {
            return response()->json([
                "status" => false,
                "error" => ["email" => [$request->language == "vi" ? "Email này chưa được đăng ký" : "This email isn't registered"]]
            ]);
        }
        $code = $this->generateRandomString(6);
        Users_Model::find($users->id)->update(['password_reset' => $code]);
        $email = $request->email;
        if ($request->language == "vi") {
            Mail::send('API::email.forgotpassword_vi', [
                'email' => $email,
                'reset_code' => $code //$confirmation_code
            ], function ($message) use ($email) {
                $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
                $message->to($email)->subject("Yêu cầu đặt lại mật khẩu");
            });
            return response()->json([
                "status" => true,
                "msg" => "Đã gửi yêu cầu, vui lòng kiểm tra email."
            ]);
        } else {
            Mail::send("API::email.forgotpassword_en", [
                'email' => $email,
                'reset_code' => $code //$confirmation_code
            ], function ($message) use ($email) {
                $message->from('noreply@visithcmc.vn', 'HCMC Tourism');
                $message->to($email)->subject("Request a password reset");
            });
            return response()->json([
                "status" => true,
                "msg" => "Request sent, please check email."
            ]);
        }
    }


    public function forgotPassword_checkcode(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "language" => "required",
                "code" => "required",
            ],
            [
                "code.required" => $request->language == "vi" ? "Vui lòng nhập mã" : "Code is required"
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::where("email", $request->email)->where("password_reset", $request->code)->first();
        if (empty($users)) {
            return response()->json([
                "status" => false,
                "msg" => $request->language == "vi" ? "Mã được yêu cầu không chính xác." : "The requested code is incorrect.",
                "error" => ["code" => [$request->language == "vi" ? "Mã được yêu cầu không chính xác." : "The requested code is incorrect."]]
            ]);
        } else {
            return response()->json([
                "status" => true,
                "msg" => "Success!"
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = null;
        if ($request->isForgotpassword) {
            $validator = Validator::make(
                $request->all(),
                [
                    "email" => "required|email",
                    "language" => "required",
                    "isForgotpassword" => "required",
                    "password" => "required|min:6",
                    "password_confirm" => "required|same:password",

                ],
                [
                    "code.required" => $request->language == "vi" ? "Vui lòng nhập mã" : "Code is required",
                    "password.required" => $request->language == "vi" ? 'Vui lòng nhập mật khẩu' : "Password is required",
                    "password.min" => $request->language == "vi" ? "Mật khẩu ít nhất 6 ký tự" : "Password must be at least 6 characters",
                    "password_confirm.required" => $request->language == "vi" ? "Vui lòng nhập lại mật khẩu" : "Password confirm is required",
                    "password_confirm.same" => $request->language == "vi" ? "Nhập lại mật khẩu không đúng" : "Confirmation password does not match",
                ]
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    "email" => "required|email",
                    "language" => "required",
                    "password" => "required|min:6",
                    "password_confirm" => "required|same:password",
                    "password_old" =>  "required"
                ],
                [
                    "password.required" => $request->language == "vi" ? 'Vui lòng nhập mật khẩu' : "Password is required",
                    "password.min" => $request->language == "vi" ? "Mật khẩu ít nhất 6 ký tự" : "Password must be at least 6 characters",
                    "password_confirm.required" => $request->language == "vi" ? "Vui lòng nhập lại mật khẩu" : "Password confirm is required",
                    "password_confirm.same" => $request->language == "vi" ? "Nhập lại mật khẩu không đúng" : "Confirmation password does not match",
                    "password_old.required" => $request->language == "vi" ? "Vui lòng nhập mật khẩu hiện tại" : "Please enter the current password"
                ]
            );
        }
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "error" => $validator->errors()
            ]);
        }
        $users = Users_Model::where("email", $request->email)->first();
        if (empty($users)) {
            return response()->json([
                "status" => false,
                "msg" => $request->language == "vi" ? "Email không tồn tại" : "Email does not exist",
            ]);
        }
        if ($request->isForgotpassword) {
            Users_Model::find($users->id)
                ->update([
                    'password_reset' => "",
                    "password" => Hash::make($request->password_confirm)
                ]);
            return response()->json([
                "status" => true,
                "msg" => $request->language == "vi" ? "Thay đổi mật khẩu thành công" : "Change password successfully"
            ]);
        } else {
            if (Hash::check($request->password_old, $users->password)) {
                Users_Model::find($users->id)
                    ->update([
                        "password" => Hash::make($request->password_confirm)
                    ]);
                return response()->json([
                    "status" => true,
                    "msg" => $request->language == "vi" ? "Thay đổi mật khẩu thành công" : "Change password successfully"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "error" => ["password_old" => [$request->language == "vi" ? "Mật khẩu hiện tại không đúng" : "Current password is incorrect"]],
                ]);
            }
        }
    }

    private function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function findUsers(Request $request)
    {
        $users = Users_Model::find($request->id);
        return response()->json([
            "username" => $users->username,
            "photo" => 
            "https://api.onicorn.vn/public/".(empty($users->photo)? "assets/images/photo.jpeg" : "upload/images/users/thumb/".$users->photo)
        ]);
    }
    //list users:
    public function getusers()
    {
        //$users = Users_Model::all();
        return response()->json([
            'status' => true,
            'msg' => 'Query Sussers',
            
        ]);
    }
}
