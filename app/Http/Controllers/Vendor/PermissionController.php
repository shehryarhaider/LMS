<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Permission;
use DataTables;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.permission.permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDatatable()
    {
        // gets the selects colums only
        $permission = Permission::with(['menus' => function ($query) {
            $query->select('id', 'name');
        }])->select(['id', 'menu_id', 'name', 'route'])->get()->sortBy('menu_id');
        return DataTables::of($permission)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menu' => Menu::where('parent_id',0)->get()->sortBy('sort'),
            'isEdit' => false,
        ];

        return view('vendor.permission.add-permission', $data);
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
            'menu_id' => 'required|exists:um_menus,id',
            'name' => 'required',
            'route' => 'required',
        ]);

        Permission::create($request->except('_token'));

        return redirect()->route('vendor.permission');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $data = [
            'permission' => $permission,
            'menu' => Menu::where('parent_id',0)->get()->sortBy('sort'),
            'isEdit'=> true,
        ];

        return view('vendor.permission.add-permission', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        $request->validate([
            'menu_id' => 'required|exists:um_menus,id',
            'name' => 'required',
            'route' => 'required',
        ]);

        $permission->update($request->except('_token'));

        return redirect()->route('vendor.permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $permission = Permission::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Permission has Cases assgined to it';
            return response()->json($response, 409);
        } else {
            $response = $permission->delete();

            return response()->json($response, 200);
        }
    }
}
