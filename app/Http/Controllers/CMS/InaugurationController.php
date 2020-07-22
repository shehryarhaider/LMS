<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;

class InaugurationController extends Controller
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
            'intro_inauguration_header'         =>   $cms->where('type',10)->first(),
        ];
        return view('cms.pages.inauguration.inauguration', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inaugurationUpdate(Request $request)
    {
        $cms = CMS::where('type',10)->first();
        $cms->heading           =   $request->heading;
        $cms->text              =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.inauguration');
    }
}
