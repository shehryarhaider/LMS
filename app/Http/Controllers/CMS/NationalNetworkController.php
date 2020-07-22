<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;

class NationalNetworkController extends Controller
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
            'intro_natioanlNetwork_header'         =>   $cms->where('type',8)->first(),
        ];
        return view('cms.pages.national_network.national_network', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nationalNetworkUpdate(Request $request)
    {
        $cms = CMS::where('type',8)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.international_network');
    }
}
