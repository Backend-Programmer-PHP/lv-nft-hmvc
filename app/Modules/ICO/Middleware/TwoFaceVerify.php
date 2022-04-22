<?php

namespace App\Modules\ICO\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TwoFaceVerify
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
        // Kiểm tra session 2fa_verified
        // Thực hiện redirect tới màn hình nhập Authentication code
        if (Auth::user() == null) {
            return redirect()->route('ico.users.login');
        }
        if (Auth::user()->google2fa_enable && !session('2fa_verified')) {
            return redirect()->route('ico.security.twoFace');
        }
        if (!Auth::user()->google2fa_enable) {
//            return redirect()->route('ico.account.index')->with(["type" => "warning", "flash_message" => "Please verify 2FA !."]);

            return redirect()->route('ico.security.2fa.authencation');
        }

        return $next($request);
    }
}