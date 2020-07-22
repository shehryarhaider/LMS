<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
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
            'intro_mission_header'         =>   $cms->where('type',5)->first(),
        ];
        return view('cms.pages.mission.mission', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function introMissionHeaderUpdate(Request $request)
    {
        $cms = CMS::where('type',5)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        if($request->image)
        {
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $cms->save();
        return redirect()->route('padeaf.mission');
    }
}
