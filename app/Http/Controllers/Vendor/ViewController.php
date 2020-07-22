<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['views'] = Storage::disk('resource')->allFiles();

        return view('vendor.mvc.view.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['directories'] = Storage::disk('resource')->allDirectories();

        return view('vendor.mvc.view.add-view', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->view->getClientOriginalName();
        $request->view->move(resource_path('views').'/'.$request->path,$name);

        return redirect()->route('vendor.mvc.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Storage::disk('resource')->delete($request->name)) {
            return response()->json(['The view has been deleted'], 200);
        } else {
            return response()->json(['The view was not deleted due to an error'], 409);
        }

    }
}
