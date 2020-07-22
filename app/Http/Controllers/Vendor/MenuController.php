<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use App\WebMenus;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'menu'=> Menu::with('children')->where('parent_id',0)->get()->sortBy('sort'),
            // following is project specific
            'site_menu'=> WebMenus::where('status',1)->get()->sortBy('sort'),
        ];

        return view('vendor.menu.menu', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'parent' => Menu::with('children')->where('parent_id',0)->get()->sortBy('sort'),
            'isEdit' => false,
        ];

        return view('vendor.menu.add-menu', $data);
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

            'parent_id' => 'required',
            'name'      => 'required',
        ]);

        // $request['type'] = 0;
        Menu::create($request->except('_token'));

        return redirect()->route('vendor.menu');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $data = [
            'menu' => $menu,
            'parent' => Menu::with('children')->where('parent_id',0)->get()->sortBy('sort'),
            'isEdit'=> true,
        ];

        return view('vendor.menu.add-menu', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu)
    {
        $request->validate([
            'parent_id' => 'required',
            'name' => 'required',
        ]);

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

        $item = Menu::find($id);

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
        $Menu = Menu::findOrFail($request->id);

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
