<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * returns the cases report search view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.reports.report');
    }

    /**
     * looks up the credentials inside the database and returns data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        $request->validate([
            // 'nature' => 'nullable|exists:natures,id',
        ]);

        $data = [];

        // sets the start date at index 0 and ending date at index 1
        $date = explode(' - ', $request->date);

        $user = User::where([
            ['created_at', '>=', $date[0] . " 00:00:00"],
            ['created_at', '<=', $date[1] . " 23:59:59"],
        ])->get();

        $data = [
            'user' => $user,
        ];

        return view('cms.reports.report-list', $data);
    }

}
