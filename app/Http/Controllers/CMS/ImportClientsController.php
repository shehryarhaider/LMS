<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\ClientFiles;
use App\Client;
use Storage;
use League\Csv\Reader;

class ImportClientsController extends Controller
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
        $menu_id = getCurrentMenuIdByRouteName('clients');

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        return view('cms.clients.import.import', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $roles = ClientFiles::with(['clients' => function ($query) {
            $query->select('client_files_id')->count();
        }]);

        return DataTables::of($roles)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.clients.import.create');
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
            'file'        => 'required|mimes:csv,txt',
            'file_name'   => 'required|',
        ]);

        $insert = $request->except("_token","_method","file");

        if ($request->file) {
            $file = Storage::disk('import')->putFile('', $request->file);
            $insert['file'] = $file;
        }

        $file = ClientFiles::create($insert);

        // form helpers.php
        logAction($request);

        return redirect()->route('import.clients.edit', $file->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientFiles  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientFiles $import)
    {
        $csv = Reader::createFromPath(public_path('uploads/import/'.$import->file), 'r');
        $csv->setHeaderOffset(0);

        $data = [
            'import' => $import,
            'header' => $csv->getHeader(), //returns the CSV header record
        ];

        return view('cms.clients.import.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientFiles  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ClientFiles $import)
    {
        Client::where("client_files_id", $import->id)->delete();

        $csv = Reader::createFromPath(public_path('uploads/import/'.$import->file), 'r');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object


        $json = [];

        foreach($records as $key => $value)
        {
            $json[] = $value;
        }

        $data = [
            'json'      => json_encode($json),
            'import'    => $import,
        ];

        return view('cms.clients.import.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientFiles  $import
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request,ClientFiles $import)
    {

        Client::where("client_files_id", $import->id)->delete();

        $csv = Reader::createFromPath(public_path('uploads/import/'.$import->file), 'r');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        foreach($records as $key => $value)
        {
            $value['client_files_id'] = $import->id;
            Client::create($value);
        }

        return redirect()->route('import.clients');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $import = ClientFiles::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This booth has been assgined to booth(s)';
            return response()->json($response, 409);
        } else {
            Client::where("client_files_id", $import->id)->delete();
            Storage::disk('import')->delete($import->file);
            $response = $import->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
