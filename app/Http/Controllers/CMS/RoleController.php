<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Role;
use App\RoleMenu;
use App\RolePermission;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        return view('cms.roles.roles',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $roles = Role::select(['id','name','description']);

        return DataTables::of($roles)->make();
    }

    /**
     * the ajax validator for this controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function validater(Request $request, $id)
    {
        $request->validate([
            'name' => "nullable|max:100|unique:um_roles,name,{$id}",
        ]);

        return response()->json(['Message'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['isEdit'] = false;

        return view('cms.roles.add-role', $data);
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
            'name' => 'required|max:100|unique:um_roles,name',
            'description' => 'nullable|max:191',
            'menu' => 'required',
        ]);

        $item = new Role;

        $item->name = $request->name;
        $item->description = $request->description;

        $item->save();

        foreach ($request->menu as $key => $value) {
            $roleMenu = new RoleMenu;

            $roleMenu->role_id = $item->id;
            $roleMenu->menu_id = $key;

            $roleMenu->save();
        }

        if ($request->permission != null) {
            foreach ($request->permission as $key => $value) {
                $rolePermission = new RolePermission;

                $rolePermission->role_id = $item->id;
                $rolePermission->permission_id = $key;

                $rolePermission->save();
            }
        }

        // form helpers.php
        logAction($request);

        return redirect()->route('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data = [
            'setRole' => $role,
            'setMenus' => $role->menus()->pluck('um_menus.id')->toarray(),
            'setPermissions' => $role->permissions()->pluck('um_permissions.id')->toarray(),
            'isEdit' => true,
        ];

        return view('cms.roles.add-role', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $network
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $roleMenu = RoleMenu::where('role_id', $role->id)->delete();

        $rolePermission = RolePermission::where('role_id', $role->id)->delete();

        $request->validate([
            'name' => "required|max:100|unique:um_roles,name,{$role->id}",
            'description' => 'nullable|max:191',
            'menu' => 'required',
        ]);

        $role->name = $request->name;
        $role->description = $request->description;

        $role->save();

        foreach ($request->menu as $key => $value) {
            $roleMenu = new RoleMenu;

            $roleMenu->role_id = $role->id;
            $roleMenu->menu_id = $key;

            $roleMenu->save();
        }

        if ($request->permission != null) {
            foreach ($request->permission as $key => $value) {
                $rolePermission = new RolePermission;

                $rolePermission->role_id = $role->id;
                $rolePermission->permission_id = $key;

                $rolePermission->save();
            }
        }

        // form helpers.php
        logAction($request);

        return redirect()->route('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (User::where('role_id', $request->id)->get()->count() > 0) {
            $response['error'] = 'This Role has Users assgined to it';
            return response()->json($response, 409);
        } else {
            $response = Role::destroy([$request->id]);

            $roleMenu = RoleMenu::where('role_id', $request->id)->delete();

            $rolePermission = RolePermission::where('role_id', $request->id)->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
