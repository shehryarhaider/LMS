<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BasicLiteracyClassController extends Controller
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
            'intro_BL_class_header'     =>   $cms->where('type',24)->first(),
        ];
        return view('cms.pages.basic_literacy_class.basic_literacy_class', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function BLClassUpdate(Request $request)
    {
        $cms = CMS::where('type',24)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        if($request->attachment){
            Storage::disk('padeaf')->delete($cms->attachment);
            $cms->attachment = Storage::disk('padeaf')->putFile('',$request->attachment);
        }
        $cms->save();
        return redirect()->route('padeaf.literacy_class');
    }
}
