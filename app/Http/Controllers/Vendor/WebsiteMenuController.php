<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Website;
use App\WebMenus;
use Illuminate\Http\Request;

class WebsiteMenuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'parent' => WebMenus::with('children')->where('parent_id',0)->get()->sortBy('sort'),
            'isEdit' => false,
        ];

        return view('vendor.menu.add-website-menu', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required',
            'content_route' => 'required_with:is_content'
        ]);

        // $request['type'] = 1;
        WebMenus::create($request->except('_token'));

        return redirect()->route('vendor.menu');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(WebMenus $menu)
    {
        $data = [
            'menu' => $menu,
            'parent' => WebMenus::with('children')->where('parent_id',0)->get()->sortBy('sort'),
            'isEdit'=> true,
        ];

        return view('vendor.menu.add-website-menu', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,WebMenus $menu)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required',
            'content_route' => 'required_with:is_content'
        ]);

        if (!$request->is_seo) {
            $request['is_seo'] = 0;
        }

        if (!$request->is_content) {
            $request['is_content'] = 0;
        }

        $menu->update($request->except('_token'));

        return redirect()->route('vendor.menu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $response['status'] = false;
        $response['message'] = 'Oops! Something went wrong.';

        $id = $request->input('id');
        $status = $request->input('status');

        $item = WebMenus::find($id);

        if ($item->update(['status' => $status])) {

            $response['status'] = true;
            $response['message'] = 'Menu status updated successfully.';
            return response()->json($response, 200);
        }

        return response()->json($response, 409);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Menu = WebMenus::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Menu has Cases assgined to it';
            return response()->json($response, 409);
        } else {
            $response = $Menu->delete();

            return response()->json($response, 200);
        }
    }
}
