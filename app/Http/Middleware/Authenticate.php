<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('dashboard.*')){
                return route('dashboard.login');
            }
            if(Route::is('ico.*')){
                return route('ico.users.login');
            }
            if(Route::is('api.*')){
                return route('api.default');
            }
            return route('users.login');
        }
    }
}
