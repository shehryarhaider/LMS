<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrilliantStudentController extends Controller
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
            'intro_bs_header'     =>   $cms->where('type',27)->first(),
            'intro_bs_section'    =>   $cms->where('type',28)->first(),
        ];
        return view('cms.pages.brilliant_student.brilliant_student', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function BSSectionUpdate(Request $request)
    {
        $cms = CMS::where('type',27)->first();
        
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        
        $cms->save();
        return redirect()->route('padeaf.deaf_empowerment_education_center');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function BSUpdate(Request $request)
    {
        $cms = CMS::where('type',28)->first();
        $cms->text      =   $request->below_heading;
        if($request->image){
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('', $request->image);
        }
        if($request->attachment){
            Storage::disk('padeaf')->delete($cms->attachment);
            $cms->attachment = Storage::disk('padeaf')->putFile('', $request->attachment);
        }
        $cms->save();
        return redirect()->route('padeaf.deaf_empowerment_education_center');
    }

     
}
