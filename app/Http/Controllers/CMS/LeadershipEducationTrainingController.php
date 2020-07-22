<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeadershipEducationTrainingController extends Controller
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
            'intro_LET_header'     =>   $cms->where('type',26)->first(),
        ];
        return view('cms.pages.leadership_education_training.leadership_education_training', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function LETUpdate(Request $request)
    {
        $cms = CMS::where('type',26)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->below_heading;
        $cms->save();
        return redirect()->route('padeaf.education_training');
    }
}
