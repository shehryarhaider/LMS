<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Storage::disk('app')->files();

        return view('vendor.mvc.model.model', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.mvc.model.add-model');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->model->getClientOriginalName();
        $request->model->move(app_path(),$name);

        return redirect()->route('vendor.mvc.model');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Storage::disk('app')->delete($request->name)) {
            return response()->json(['The model has been deleted'], 200);
        } else {
            return response()->json(['The model was not deleted due to an error'], 409);
        }

    }
}
