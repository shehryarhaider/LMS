<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisionController extends Controller
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
            'intro_vision_header'         =>   $cms->where('type',4)->first(),
        ];
        return view('cms.pages.vision.vision', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function introVisionHeaderUpdate(Request $request)
    {
        $cms = CMS::where('type',4)->first();
        $cms->heading   =   $request->heading;
        $cms->icon      =   $request->image;
        $cms->text      =   $request->text;
        if($request->image)
        {
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $cms->save();
        return redirect()->route('padeaf.introduction');
    }
}
