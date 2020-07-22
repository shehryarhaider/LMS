<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;

class FindingSurveyController extends Controller
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
            'intro_findingsurvey_header'     =>   $cms->where('type',12)->first(),
        ];
        return view('cms.pages.findingsurvey.findingsurvey', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findingSurveyUpdate(Request $request)
    {
        $cms = CMS::where('type',12)->first();
        $cms->heading     =   $request->heading;
        $cms->text        =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.finding_survey_report');
    }
}
