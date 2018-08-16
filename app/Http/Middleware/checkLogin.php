<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->role == 1 || $user->role == 2)
            {
                $request->session()->put('user', $user);
                return $next($request);
            }
            else
            {
                return redirect( '/' ) -> with('notify', trans('messages.admin_login'));
            }
        }
        else
            return redirect( '/login' ) -> with('notify', trans('messages.is_correct'));
    }
}
