<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;

class ValueController extends Controller
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
            'intro_value_header'         =>   $cms->where('type',6)->first(),
        ];
        return view('cms.pages.values.value', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function valueUpdate(Request $request)
    {
        $cms = CMS::where('type',6)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.values');
    }
}
