<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnglishClassController extends Controller
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
            'intro_english_class_header'     =>   $cms->where('type',16)->first(),
        ];
        return view('cms.pages.english_class.english_class', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function englishClassUpdate(Request $request)
    {
        $cms = CMS::where('type',16)->first();
        $cms->heading   =   $request->heading;
        $cms->save();
        return redirect()->route('padeaf.english_class');
    }
}
