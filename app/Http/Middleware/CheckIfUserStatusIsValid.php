<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckIfUserStatusIsValid
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
        if (Auth::user() && Auth::user()->status == 0) {
            Auth::user()->remember_token = null;
            Auth::user()->save();
            $request->session()->flush();
            return redirect()->route('login')->withErrors(['status'=> 'Your User account has been disabled']);
        }

        return $next($request);
    }
}
