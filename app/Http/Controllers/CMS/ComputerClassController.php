<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComputerClassController extends Controller
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
            'intro_computer_class_header'     =>   $cms->where('type',18)->first(),
        ];
        return view('cms.pages.computer_class.computer_class', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function computerClassUpdate(Request $request)
    {
        $cms = CMS::where('type',18)->first();
        $cms->heading   =   $request->heading;
        if($request->attachment){
            Storage::disk('padeaf')->delete($cms->attachment);
            $cms->attachment = Storage::disk('padeaf')->putFile('',$request->attachment);
        }
        $cms->save();
        return redirect()->route('padeaf.computer_class');
    }
}
