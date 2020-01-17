<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LoggedIn
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
        if (is_null(Auth::user())) {

            return redirect('sign-up');
        }
        return redirect('sign-up');
    }
}
