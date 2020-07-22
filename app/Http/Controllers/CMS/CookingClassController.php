<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CookingClassController extends Controller
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
            'intro_cooking_class_header'     =>   $cms->where('type',20)->first(),
        ];
        return view('cms.pages.cooking_class.cooking_class', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cookingClassUpdate(Request $request)
    {
        $cms = CMS::where('type',20)->first();
        $cms->heading   =   $request->heading;
        $cms->text      =   $request->text;
        if($request->image){
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('',$request->image);
        }
        if($request->attachment){
            Storage::disk('padeaf')->delete($cms->attachment);
            $cms->attachment = Storage::disk('padeaf')->putFile('',$request->attachment);
        }
        $cms->save();
        return redirect()->route('padeaf.cooking_class');
    }
}
