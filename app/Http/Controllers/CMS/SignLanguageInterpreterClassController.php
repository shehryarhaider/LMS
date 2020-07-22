<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignLanguageInterpreterClassController extends Controller
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
            'intro_Sil_class_header'     =>   $cms->where('type',25)->first(),
        ];
        return view('cms.pages.sign_language_class.sign_language_class', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function BLClassUpdate(Request $request)
    {
        $cms = CMS::where('type',25)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        if($request->attachment){
            Storage::disk('padeaf')->delete($cms->attachment);
            $cms->attachment = Storage::disk('padeaf')->putFile('',$request->attachment);
        }
        $cms->save();
        return redirect()->route('padeaf.interpreter_class');
    }
}
