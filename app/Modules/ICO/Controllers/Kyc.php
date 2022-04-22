<?php

namespace App\Modules\ICO\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ICO\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use function Illuminate\Support\Facades\View;
use GuzzleHttp\Psr7;
class Kyc extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        return \view("ICO::Kyc.index");
    }

    public function checkEmail(Request $request)
    {
        $body = [
            [
                'name'=>'email',
                'contents'=>$request->get('email_otp')
            ]
        ];
        $url = "https://ekyc.live/api/otp-email";
        $result = Helper::api_kyc_post($url, $body);
        if ($result['status'] == true) {
            return redirect()->route('ico.kyc.index')->with(["type" => "success", "flash_message" => $result['messages']]);
        }
        return redirect()->route('ico.kyc.index')->with(["type" => "warning", "flash_message" => $result['messages']]);
    }

    public function getIdentityCard()
    {
        return \view('ICO::Kyc.IdentityCard');
    }

    public function postIdentityCard(Request $request)
    {
        try {
            $rules = array(
                'image' => 'image|mimes:jpeg,JPEG,jpg,JPG,png,PNG|max:2048|required' // max 10000kb
            );
            $validator = $this->validate($request,
                [
                    'email' => 'bail|required|email',
                    'otp' => 'bail|required|',
                    'img_identity_front' => $rules['image'],
                    'img_identity_behind' => $rules['image'],
                    'img_face' => $rules['image'],
                    'gender' => 'bail|required|in:0,1'
                ],

            // [
            //     'img_identity_front.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_bihind.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_face.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            // ]
            );

            $user = Auth::User();
            //delete file exist in public
            if ($user->img_identity_front != null) {
                File::delete(public_path($user->img_identity_front));
                File::delete(public_path($user->img_identity_behind));
                File::delete(public_path($user->img_face_camera));
            }
            $file_identity_front  = $request->file('img_identity_front');
            $file_identity_behind = $request->file('img_identity_behind');
            $img_face = $request->file('img_face');

            //call api verify identity card
            $url = "https://ekyc.live/api/api-cmnd";
            $gender=0;
            if($request->get('gender')){
                $gender=1;
            }
            $body=[
                [
                    'name'     => 'email',
                    'contents' => $request->get('email'),
                ],
                [
                    'name'     => 'otp',
                    'contents' => $request->get('otp')
                ],
                [
                    'name'     => 'front',
                    'contents' => fopen($file_identity_front->getPathname(),'r'),
                    'filename' => $file_identity_front->getClientOriginalName()
                ],
                [
                    'name'     => 'behind',
                    'contents' => fopen($file_identity_behind->getPathname(),'r'),
                    'filename' => $file_identity_behind->getClientOriginalName()
                ],
                [
                    'name'     => 'face_camera',
                    'contents' => fopen($img_face->getPathname(),'r'),
                    'filename' => $img_face->getClientOriginalName()
                ],
                [
                    'name'     => 'gender',
                    'contents' => $gender
                ],
            ];

            $result = Helper::api_kyc_post($url, $body);
            //save image to public folder
            $path_identity_front = 'upload/images/users/images_identity_front';
            $path_identity_behind = 'upload/images/users/images_identity_behind';
            $path_face = ('upload/images/users/images_face');

            $file_path_identity_front = Helper::saveImageToPublic($request->file('img_identity_front'), $path_identity_front);
            $file_path_identity_behind = Helper::saveImageToPublic($request->file('img_identity_behind'), $path_identity_behind);
            $file_path_face = Helper::saveImageToPublic($request->file('img_face'), $path_face);
            //update table users
            DB::table('users')->where('id', $user->id)->update([
                'img_identity_front' => $file_path_identity_front['path'],
                'img_identity_behind' => $file_path_identity_behind['path'],
                'img_face_camera' => $file_path_face['path'],
                'gender' => $request->gender,
                'photo'=>$file_path_face['path'],
                'updated_at' => Carbon::now()
            ]);
            //insert table kyc
            $kyc_id = DB::table('kyc')->insertGetId([
                'users_id' => $user->id,
                'img_identity_front' => $file_path_identity_front['path'],
                'img_identity_behind' => $file_path_identity_behind['path'],
                'img_face' => $file_path_face['path'],
                'type' => 0,
                'created_at' => Carbon::now()
            ]);

            if ($result['status']) {
                //update table users after call api
                DB::table('users')->where('id', $user->id)->update([
                    'kyc_status' => 1,
                    'updated_at' => Carbon::now()
                ]);
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 1,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('ico.kyc.index')->with(["type" => "success", "flash_message" => $result['messages']]);
            } else {
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 0,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => $result['messages']]);
            }
        } catch (ValidationException $exception) {
            return redirect()->back()->withInput()->withErrors($exception->errors());
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function getPassport()
    {
        return \view('ICO::Kyc.passport');
    }

    public function postPassport(Request $request)
    {
        try {
            $rules = array(
                'image' => 'image|mimes:jpeg,JPEG,jpg,JPG,png,PNG|max:2048|required' // max 10000kb
            );
            $validator = $this->validate($request,
                [
                    'email' => 'bail|required|email',
                    'otp' => 'bail|required|',
                    'img_passport' => $rules['image'],
                    'img_face' => $rules['image'],
                ],

            // [
            //     'img_identity_front.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_bihind.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_face.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            // ]
            );

            $user = Auth::User();
            //delete file exist in public
            if ($user->img_passport != null) {
                File::delete(public_path($user->img_passport));
                File::delete(public_path($user->img_face_camera));
            }
            $img_passport  = $request->file('img_passport');
            $img_face = $request->file('img_face');

            //call api verify identity card
            $url = "https://ekyc.live/api/api-passport";

            $body=[
                [
                    'name'     => 'email',
                    'contents' => $request->get('email'),
                ],
                [
                    'name'     => 'otp',
                    'contents' => $request->get('otp')
                ],
                [
                    'name'     => 'passport',
                    'contents' => fopen($img_passport->getPathname(),'r'),
                    'filename' => $img_passport->getClientOriginalName()
                ],
                [
                    'name'     => 'face_camera',
                    'contents' => fopen($img_face->getPathname(),'r'),
                    'filename' => $img_face->getClientOriginalName()
                ],
            ];

            $result = Helper::api_kyc_post($url, $body);
            //save image to public folder
            $path_passport = 'upload/images/users/images_passport';
            $path_face = ('upload/images/users/images_face');

            $file_path_passport = Helper::saveImageToPublic($request->file('img_passport'), $path_passport);
            $file_path_face = Helper::saveImageToPublic($request->file('img_face'), $path_face);
            //update table users
            DB::table('users')->where('id', $user->id)->update([
                'img_passport' => $file_path_passport['path'],
                'img_face_camera' => $file_path_face['path'],
                'photo'=>$file_path_face['path'],
                'updated_at' => Carbon::now()
            ]);
            //insert table kyc
            $kyc_id = DB::table('kyc')->insertGetId([
                'users_id' => $user->id,
                'img_passport' => $file_path_passport['path'],
                'img_face' => $file_path_face['path'],
                'type' => 0,
                'created_at' => Carbon::now()
            ]);

            if ($result['status']) {
                //update table users after call api
                DB::table('users')->where('id', $user->id)->update([
                    'kyc_status' => 1,
                    'updated_at' => Carbon::now()
                ]);
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 1,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('ico.kyc.index')->with(["type" => "success", "flash_message" => $result['messages']]);
            } else {
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 0,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => $result['messages']]);
            }
        } catch (ValidationException $exception) {
            return redirect()->back()->withInput()->withErrors($exception->errors());
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function getDriverLicense()
    {
        return \view('ICO::Kyc.driverLicense');
    }

    public function postDriverLicense(Request $request)
    {
        try {
            $rules = array(
                'image' => 'image|mimes:jpeg,JPEG,jpg,JPG,png,PNG|max:2048|required' // max 10000kb
            );
            $validator = $this->validate($request,
                [
                    'email' => 'bail|required|email',
                    'otp' => 'bail|required|',
                    'img_driver_license_front' => $rules['image'],
                    'img_driver_license_behind' => $rules['image'],
                    'img_face' => $rules['image'],
                ],

            // [
            //     'img_identity_front.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_bihind.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            //     // 'img_identity_face.mimes' => 'Please select the file with the extension jpeg,JPEG,jpg,JPG,png,PNG',
            // ]
            );

            $user = Auth::User();
            //delete file exist in public
            if ($user->img_driver_license_front != null) {
                File::delete(public_path($user->img_driver_license_front));
                File::delete(public_path($user->img_driver_license_behind));
                File::delete(public_path($user->img_face_camera));
            }
            $file_driver_license_front  = $request->file('img_driver_license_front');
            $file_driver_license_behind = $request->file('img_driver_license_behind');
            $img_face = $request->file('img_face');

            //call api verify driver
            $url = "https://ekyc.live/api/api-driver";

            $body=[
                [
                    'name'     => 'email',
                    'contents' => $request->get('email'),
                ],
                [
                    'name'     => 'otp',
                    'contents' => $request->get('otp')
                ],
                [
                    'name'     => 'front',
                    'contents' => fopen($file_driver_license_front->getPathname(),'r'),
                    'filename' => $file_driver_license_front->getClientOriginalName()
                ],
                [
                    'name'     => 'behind',
                    'contents' => fopen($file_driver_license_behind->getPathname(),'r'),
                    'filename' => $file_driver_license_behind->getClientOriginalName()
                ],
                [
                    'name'     => 'face_camera',
                    'contents' => fopen($img_face->getPathname(),'r'),
                    'filename' => $img_face->getClientOriginalName()
                ],

            ];

            $result = Helper::api_kyc_post($url, $body);
            //save image to public folder
            $path_driver_license_front = 'upload/images/users/images_driver_front';
            $path_driver_license_behind = 'upload/images/users/images_driver_behind';
            $path_face = ('upload/images/users/images_face');

            $file_path_driver_front = Helper::saveImageToPublic($request->file('img_driver_license_front'), $path_driver_license_front);
            $file_path_driver_behind = Helper::saveImageToPublic($request->file('img_driver_license_behind'), $path_driver_license_behind);
            $file_path_face = Helper::saveImageToPublic($request->file('img_face'), $path_face);
            //update table users
            DB::table('users')->where('id', $user->id)->update([
                'img_driver_license_front' => $file_path_driver_front['path'],
                'img_driver_license_behind' => $file_path_driver_behind['path'],
                'img_face_camera' => $file_path_face['path'],
                'photo'=>$file_path_face['path'],
                'updated_at' => Carbon::now()
            ]);
            //insert table kyc
            $kyc_id = DB::table('kyc')->insertGetId([
                'users_id' => $user->id,
                'img_driver_license_front' => $file_path_driver_front['path'],
                'img_driver_license_behind' => $file_path_driver_behind['path'],
                'img_face' => $file_path_face['path'],
                'type' => 0,
                'created_at' => Carbon::now()
            ]);

            if ($result['status']) {
                //update table users after call api
                DB::table('users')->where('id', $user->id)->update([
                    'kyc_status' => 1,
                    'updated_at' => Carbon::now()
                ]);
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 1,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('ico.kyc.index')->with(["type" => "success", "flash_message" => $result['messages']]);
            } else {
                //update table kyc after call api
                DB::table('kyc')->where('id', $kyc_id)->update([
                    'status' => 0,
                    'note' => $result['messages'],
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->back()->withInput()->with(["type" => "warning", "flash_message" => $result['messages']]);
            }
        } catch (ValidationException $exception) {
            return redirect()->back()->withInput()->withErrors($exception->errors());
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors($exception->getMessage());
        }
    }
}