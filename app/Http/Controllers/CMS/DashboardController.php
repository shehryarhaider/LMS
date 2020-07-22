<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        // to counter a weird bug where login redirects to empty page
        $previous = str_replace(url('/'), '', url()->previous());
        $previous = app('router')->getRoutes()->match(app('request')->create($previous))->getName();

        if ($previous == 'login') {
            return redirect()->route('dashboard');
        }

        return view('cms.empty');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            //users
            'users' => $this->users(),
        ];

        return view('cms.dashboard', $data);
    }

    /**
     *
     * @param void
     *
     */
    private function users()
    {
        return User::where('user_type',1)->get()->count();
    }
}
