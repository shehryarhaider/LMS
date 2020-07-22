<?php

namespace App\Http\Controllers\Vendor;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mvc)
    {
        $data['directories'] = Storage::disk($mvc)->allDirectories();
        $data['mvc'] = $mvc;
        return view('vendor.mvc.directory.directory', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mvc)
    {
        $data['directories'] = Storage::disk($mvc)->allDirectories();
        $data['mvc'] = $mvc;

        return view('vendor.mvc.directory.add-directory', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $mvc)
    {
        $name = $request->directory;
        Storage::disk($mvc)->makeDirectory($request->path.'/'.$name);

        return redirect()->route('vendor.mvc.directory', [$mvc]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $mvc)
    {
        if (Storage::disk($mvc)->deleteDirectory($request->name)) {
            return response()->json(['The directory has been deleted'], 200);
        } else {
            return response()->json(['The directory was not deleted due to an error'], 409);
        }
    }
}
