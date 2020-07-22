<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Storage;
use Hash;

class UsersController extends Controller
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

        $data['roles'] = Role::all();

        return view('cms.users.users', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $users = User::with(['role'=>function($query){
                                $query->select('id','name');
                            }])->select(['um_users.id','um_users.name','email','role_id','status'])->where('user_type', 1);

        return DataTables::of($users)->make();
    }

    /**
     * validates the email
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function validater(Request $request,$id)
    {
        $request->validate([
            'email' => "required|max:191|unique:um_users,email,{$id}",
        ]);

        return response()->json(['success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::select('id','name')->get(),
            'isEdit' => false,
        ];

        return view('cms.users.add-user', $data);
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
            'name' => 'required|max:191',
            'role_id' => 'required|max:191|exists:um_roles,id',
            'email' => 'required|max:191|unique:um_users',
            'password' => 'required|confirmed|min:6|max:22',
            'avatar' => 'nullable|image|dimensions:width=150,height=150',
        ]);

        $input_data = $request->except('password', 'password_confirmation');

        $input_data['password'] = bcrypt($request->input('password'));

        if($request->avatar){
            $input_data['avatar'] = Storage::disk('padeaf')->putFile('', $request->avatar);
         }

        User::create($input_data);

        // form helpers.php
        logAction($request);

        return redirect()->route('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'user' => $user,
            'roles' => Role::select('id','name')->get(),
            'isEdit' => true,
        ];

        return view('cms.users.add-user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:191',
            'role_id' => 'required|max:191|exists:um_roles,id',
            'email' => "required|max:191|unique:um_users,email,{$user->id}",
            'password' => 'nullable|confirmed|min:6|max:22',
            'avatar' => 'nullable|image|dimensions:width=150,height=150',
        ]);

        $input_data = $request->except('password', 'password_confirmation');

        if($request->password)
        {
            $input_data['password'] = bcrypt($request->input('password'));
        }

        if($request->avatar)
        {
            Storage::disk('padeaf')->delete($user->avatar);
            $input_data['avatar'] = Storage::disk('padeaf')->putFile('', $request->avatar);
        }

        $user->update($input_data);

        // form helpers.php
        logAction($request);

        return redirect()->route('users');
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

        $item = User::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'User status updated successfully.';
            return response()->json($response, 200);
        }

        return response()->json($response, 409);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This User has Cases assgined to it';
            return response()->json($response, 409);
        } else {
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $data = [
            'user' => Auth::user(),
        ];

        return view('cms.users.settings', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function patch(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => "required|max:191|unique:um_users,email,".Auth::user()->id,
            'current_password' => 'required_if:change_password,1',
            'password' => 'required_if:change_password,1|confirmed|min:6|max:22',
            'avatar' => 'nullable|image|dimensions:width=150,height=150',
        ]);

        if($request->change_password == 1 && !Hash::check($request->current_password, Auth::user()->password))
        {
            return redirect()->back()->withErrors(['current_password'=>'your current password does not match'])->withInput($request->all());

        }

        $input_data = $request->except('password', 'password_confirmation','_token','_method','change_password','current_password');

        if($request->password)
        {
            $input_data['password'] = bcrypt($request->input('password'));
        }

        if($request->avatar)
        {
            Storage::disk('padeaf')->delete(Auth::user()->avatar);
            $input_data['avatar'] = Storage::disk('padeaf')->putFile('', $request->avatar);
        }

        Auth::user()->update($input_data);

        // form helpers.php
        logAction($request);

        return redirect()->route('dashboard');
    }
}
