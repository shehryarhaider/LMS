<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Role;
use App\Client;
use Illuminate\Http\Request;
use DataTables;
use DB;

class ClientsController extends Controller
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

        return view('cms.clients.clients', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $clients = DB::table('clients')->select(['id','name','email','number','status']);

        return DataTables::of($clients)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.clients.add-clients', $data);
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
            'email' => "required|max:191|unique:clients,email",
            'number' => 'required|numeric'
        ]);

        $input_data = $request->except('_token');

        Client::create($input_data);

        // form helpers.php
        logAction($request);

        return redirect()->route('clients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data = [
            'client' => $client,
            'isEdit' => true,
        ];

        return view('cms.clients.add-clients', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => "required|max:191|unique:clients,email,{$client->id}",
            'number' => 'required|numeric'
        ]);

        $input_data = $request->except('_token');

        $client->update($input_data);

        // form helpers.php
        logAction($request);

        return redirect()->route('clients');
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

        $item = Client::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'client status updated successfully.';
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
        $client = Client::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This client has updated assgined to it';
            return response()->json($response, 409);
        } else {
            $response['client'] = $client->delete();

            // form helpers.php
            logAction($request);

            $response['success'] = 'The client has been deleted';
            return response()->json($response, 200);
        }
    }
}
