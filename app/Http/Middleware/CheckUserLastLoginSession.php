<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Illuminate\Http\Response;

class CheckUserLastLoginSession
{
    // session work
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(getConfig('single_user_session') == 0){
            return $next($request);
        }

        // if user instance is here means remember me is valid
        if (Auth::viaRemember()) {
            Auth::user()->last_session_id = $request->session()->getId();
            Auth::user()->save();
            return $next($request);
        }

        $user = Auth::user();

        $current_session_id = Session::getId(); //get  session_id

        if($user->last_session_id == $current_session_id)
        {
            return $next($request);
        }
        else if (!$user->last_session_id)
        {
            Auth::user()->last_session_id = $request->session()->getId();
            Auth::user()->save();

            return $next($request);
        }
        else
        {
            $data = [
                'user' => $user,
            ];

            return new Response(view('login.conflict', $data));
        }
    }
}
