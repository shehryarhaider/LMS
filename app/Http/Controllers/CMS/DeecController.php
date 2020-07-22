<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeecController extends Controller
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
            'intro_deec_header'      =>   $cms->where('type',14)->first(),
            'intro_deec_section'     =>   $cms->where('type',15)->first(),
        ];
        return view('cms.pages.deec.deec', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deecUpdate(Request $request)
    {
        $cms = CMS::where('type',14)->first();
        $cms->heading   =   $request->heading;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deecSectionUpdate(Request $request)
    {
        $cms = CMS::where('type',15)->first();
        $cms->text    =   $request->text;
        $cms->save();
        return redirect()->route('padeaf.deaf_empowerment_education_center');
    }
}
