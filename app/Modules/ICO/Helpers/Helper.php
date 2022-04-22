<?php

namespace App\Modules\ICO\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illiminate\Http\Response;

class Helper extends Controller
{
    public static function api_get($url=""){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "167.172.94.193:4000/api/v1".$url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output);
    }
    public static function api_post($url="",$param){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "167.172.94.193:4000/api/v1".$url);
        curl_setopt($curl, CURLOPT_POST, count($param));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($param));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output);
    }

    public static function api_get_notification($url=""){
        $curl = curl_init();
        //curl_setopt($curl, CURLOPT_URL, "167.172.94.193:6000/api/getAll?limit=10&page=0&users_id=1");
        curl_setopt($curl, CURLOPT_URL, "167.172.94.193:6000/api".$url); //getAll?limit=10&page=0&users_id=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        echo $output;
    }

    public static function api_post_notification($url = "", $param)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "167.172.94.193:6000/api" . $url);
        curl_setopt($curl, CURLOPT_POST, count($param));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($param));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output);
    }

    public static function saveImageToPublic($file, $path)
    {
        $type = $file->getClientOriginalExtension();
        $file_name = uniqid().".".$type;
        $file_path = public_path($path);
        $result = $path."/".$file_name;

        $file->move($file_path,$file_name);
        return ['path'=>$result,'name'=>$file_name];
    }
    public static function api_kyc_post($url, $body)
    {
        $client = new \GuzzleHttp\Client(['verify'=>false]);

        try{
            $response = $client->request("POST",$url, 
            [
                'headers'=>[
                    'token'=>'VERIFICATION'
                ],
                'multipart'=>$body,
            ]);
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            $response = $e->getResponse();
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }
    }

    public static function api_bgPoint_getPoint($email,$token="")
    {
        $client = new \GuzzleHttp\Client(['verify'=>false]);
        $url = "https://bg.wta.finance/api/point/getPoint";
        $settings = config('global.settings');
        $secret_key = $settings['BGPOINT_API_SECRET_KEY'];
        $body = [
            [
                'name'     => 'email',
                'contents' => $email,
            ],
            [
                'name'     => 'secret_key',
                'contents' => $secret_key
            ],
        ];
        try{
            $response = $client->request("POST",$url,
                [
                    'headers'=>[
                        'token'=>$token
                    ],
                    'multipart'=>$body,
                ]);
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            $response = $e->getResponse();
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }
    }
    public static function api_bgPoint_register($email,$token="")
    {
        $client = new \GuzzleHttp\Client(['verify'=>false]);
        $url = "https://bg.wta.finance/api/register";
        $settings = config('global.settings');
        $secret_key = $settings['BGPOINT_API_SECRET_KEY'];
        $body = [
            [
                'name'     => 'email',
                'contents' => $email,
            ],
            [
                'name'     => 'secret_key',
                'contents' => $secret_key
            ],
        ];
        try{
            $response = $client->request("POST",$url,
                [
                    'headers'=>[
                        'token'=>$token
                    ],
                    'multipart'=>$body,
                ]);
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            $response = $e->getResponse();
            $result = json_decode((string)$response->getBody(),true);
            return $result;
        }
    }
    public static function check_total_airdrop($airdrop,$type){
        if(!$type){
            if($airdrop->total >= $airdrop->bonus_value){
                return true;
            }
        }else{
            if($airdrop->total >= $airdrop->referral_value){
                return true;
            }
        }
        return false;
    }

    static function getRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function getIpClient(){
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
}