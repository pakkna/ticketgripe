<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class check_user_access
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
        if (!is_null(Auth::user())) {
            return $next($request);
        } else {
            return redirect('sign-in')->with('flashMessageDanger', 'Access Denied !');
        }
    }
}
