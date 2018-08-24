<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class checkUserCheckout
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
            $check_user = User::findOrFail( $request->route()->parameters()['id_user'] );
            $users = Auth::user();
            if($users == $check_user)
            {
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
            return redirect( 'register' );
        }
    }
}
