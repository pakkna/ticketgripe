<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        if (!is_null(Auth::user()) && Auth::user()->user_type == "Admin") {
            return $next($request);
        } else {
            return redirect('sign-in')->with('flashMessageDanger', 'Access Denied !');
        }
    }
}
