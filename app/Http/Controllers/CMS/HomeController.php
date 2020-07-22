<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use DataTables;
use File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
            'intro_Service'           =>  $cms->where('type',29)->first(),
            'intro_pak_association'   =>  $cms->where('type',31)->first(),
            'pak_association_section' =>  $cms->where('type',32)->first(),
            'intro_pad_education'     =>  $cms->where('type',33)->first(),
        ]; 
        return view('cms.pages.home.home', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ourServiceUpdate(Request $request)
    {
        $cms = CMS::where('type',29)->first();

        $cms->heading   = $request->heading;
        $cms->text      = $request->text;
        $cms->save();

        return redirect()->route('padeaf.home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pakAssociationUpdate(Request $request)
    {
        $cms = CMS::where('type',31)->first();

        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        $cms->save();

        return redirect()->route('padeaf.home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pakAssociationSectionUpdate(Request $request)
    {
        $cms = CMS::where('type',32)->first();

        if($request->image){
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('',$request->image);
        }
        $cms->text = $request->text;
        $cms->save();

        return redirect()->route('padeaf.home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function padEducationUpdate(Request $request)
    {
        $cms = CMS::where('type',33)->first();

        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        $cms->save();

        return redirect()->route('padeaf.home');
    }
}
