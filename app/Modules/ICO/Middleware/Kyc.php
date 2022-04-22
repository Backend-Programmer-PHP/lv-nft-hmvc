<?php

namespace App\Modules\ICO\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Kyc
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

        if (Auth::user() == null) {
            return redirect()->route('ico.users.login');
        }
        if (!Auth::user()->kyc_status) {
            return redirect()->route('ico.account.index')->with(["type" => "warning", "flash_message" => "Please verify Kyc !."]);
        }

        return $next($request);
    }
}