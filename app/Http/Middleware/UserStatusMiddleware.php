<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->is_active == false ){
            Auth::logout();
            return redirect()->route('login')->withErrors( (__('message.You are banned, call administrator! 87771570165')));
            }


        return $next($request);
    }
}
