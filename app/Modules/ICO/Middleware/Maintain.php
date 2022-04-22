<?php

namespace App\Modules\ICO\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Maintain
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settings = config('global.settings');
        //check maintain mode bật ko ?
        if ($settings['MAINTAIN_MODE']) {
            //Check user có tài khoản có điều hướng ko ?
            $check_user = DB::table('maintain')
                ->where('users_id',Auth::user()->id)->where('status',0);
//            dd($check_user->exists());
            //nếu tài khoản điều hướng
            if(!$check_user->exists()){
                return redirect()->route('ico.maintain.index');
            }
        }
        return $next($request);
    }
}