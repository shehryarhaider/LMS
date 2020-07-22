<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\WebMenus;

class ContentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.pages.content');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $roles = WebMenus::select(['id','name'])->where('is_content',1)->get();

        return DataTables::of($roles)->make();
    }

    /**
     * redirects page to correct link
     *
     * @param Int $site
     * @param Int $id
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request,WebMenus $menu)
    {
        return redirect()->route($menu->content_route);
    }

}
