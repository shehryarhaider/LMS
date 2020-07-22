<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UsersLogCollection;
use App\LoginHistory;
use App\Http\Resources\ActionLogCollection;
use App\ActionHistroy;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        $data = [
            'user' => User::where('user_type', 1)->get(),
        ];

        return view('cms.logs.users', $data);
    }

    /**
     * returns a users log collection
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UsersLogCollection
     */
    public function userget(Request $request)
    {
        $date = explode(' - ', $request->date);


        if ($request->user != 'null') {
            $data = LoginHistory::with('users')->where([
                ['datetime', '>=', $date[0]." 00:00:00"],
                ['datetime', '<=', $date[1]." 23:59:59"],
                ['user_id', $request->user],
            ])->get();
        } else {
            $data = LoginHistory::with('users')->where([
                ['datetime', '>=', $date[0]." 00:00:00"],
                ['datetime', '<=', $date[1]." 23:59:59"],
            ])->get();
        }

        return new UsersLogCollection($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionindex()
    {
        $data = [
            'user' => User::where('user_type', 1)->get(),
        ];

        return view('cms.logs.action', $data);
    }


    /**
     * returns a users log collection
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UsersLogCollection
     */
    public function actionget(Request $request)
    {
        $date = explode(' - ', $request->date);

        $data = [];
        if ($request->user != 'null') {
            $data = ActionHistroy::with(['user','menu','permission'])->where([
                ['datetime', '>=', $date[0]." 00:00:00"],
                ['datetime', '<=', $date[1]." 23:59:59"],
                ['user_id', $request->user],
            ])->get();
        } else {
            $data = ActionHistroy::with(['user','menu','permission'])->where([
                ['datetime', '>=', $date[0]." 00:00:00"],
                ['datetime', '<=', $date[1]." 23:59:59"],
            ])->get();
        }

        return new ActionLogCollection($data);
    }
}
