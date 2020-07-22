<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;

class ChiefPatronsMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms = CMS::get();
        $data = [
            'intro_cheifMessage_header'         =>   $cms->where('type',7)->first(),
        ];
        return view('cms.pages.chief_patrons_message.chief_patrons_message', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cheifPatronsMessageUpdate(Request $request)
    {
        $cms = CMS::where('type',7)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.chief_patrons_message');
    }
}
