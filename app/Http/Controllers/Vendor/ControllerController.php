<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['controllers'] = Storage::disk('controller')->allFiles();

        return view('vendor.mvc.controller.controller', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['directories'] = Storage::disk('controller')->allDirectories();

        return view('vendor.mvc.controller.add-controller', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->controller->getClientOriginalName();
        $request->controller->move(app_path('Http/Controllers').'/'.$request->path,$name);

        return redirect()->route('vendor.mvc.controller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Storage::disk('controller')->delete($request->name)) {
            return response()->json(['The controller has been deleted'], 200);
        } else {
            return response()->json(['The controller was not deleted due to an error'], 409);
        }

    }
}
