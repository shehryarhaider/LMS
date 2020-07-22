<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cms = CMS::get();
        $data = [
            'vision_header'         =>   $cms->where('type',1)->first(),
            'mission_header'        =>   $cms->where('type',2)->first(),
        ];
        return view('cms.pages.introduction.introduction', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function visionHeaderUpdate(Request $request)
    {
        $cms = CMS::where('type',1)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        if($request->image)
        {
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $cms->save();
        return redirect()->route('padeaf.introduction');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function missionHeaderUpdate(Request $request)
    {
        $cms = CMS::where('type',2)->first();

        $cms->heading           =   $request->heading;
        $cms->below_heading     =   $request->below_heading;
        $cms->text              =   $request->text;
        $cms->save();

        return redirect()->route('padeaf.introduction');
    }

}
