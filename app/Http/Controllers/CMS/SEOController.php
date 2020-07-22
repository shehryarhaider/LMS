<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use DataTables;
use Session;
use App\WebMenus;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.seo.seo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $roles = WebMenus::select(['id','name','seo_tags','seo_description'])->where('is_seo',1)->get();

        return DataTables::of($roles)->make();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HT\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(WebMenus $menu)
    {
        $data = [
            'menu' => $menu,
            'isEdit' => true,
        ];

        return view('cms.seo.edit-seo', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HT\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebMenus $menu)
    {
        $menu->update($request->except('_token','_method'));

        // form helpers.php
        logAction($request);

        return redirect()->route('seo',[$request->session()->get('site_id')]);
    }
}
