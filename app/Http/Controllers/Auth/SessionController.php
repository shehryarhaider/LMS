<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SessionController extends Controller
{
    // session work
    /**
     * destroy the previous session and log the user in
     *
     */
    public function destroyAndLogin(Request $request)
    {
        if (Auth::user()) {
            // adds remember cookie if present
            $cookieData = $request->cookie(Auth::getRecallerName());
            if ($cookieData) {
                Auth::user()->remember_token = substr($cookieData,2,60);
            } else {
                Auth::user()->remember_token = null;
            }

            $request->session()->getHandler()->destroy(Auth::user()->last_session_id);

            Auth::user()->last_session_id = $request->session()->getId();
            Auth::user()->last_session_data = $request->last_login_details;
            Auth::user()->save();
            Auth::user()->login_history()->create(['type' => 'Session Destroy', 'datetime' => date('Y-m-d H:i:s') ,'user_name' => Auth::user()->name]);
        }

        return redirect('/login');
    }
}
