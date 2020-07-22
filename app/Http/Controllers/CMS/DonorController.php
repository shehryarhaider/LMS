<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Donor;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
class DonorController extends Controller
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

        return view('cms.donor.donor', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {

        // gets the selects colums only
        $donor = Donor::select(['id','name','image','status']);
        return DataTables::of($donor)->make();
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

        return view('cms.donor.add-donor', $data);
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
            'name'      =>  "required|max:191|unique:padeaf_web.sm_donor,name",
            'image'     =>  'required|image',

        ]);
        $donor                  =       new Donor;
        $donor->name            =       $request->name;

        if ($request->image) {
            $donor->image = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $donor->save();

        //form helpers.php
        logAction($request);

        return redirect()->route('donor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donor  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        $data = [
            'donor' => $donor,
            'isEdit' => true,
        ];

        return view('cms.donor.add-donor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Donor $donor)
    {
        $request->validate([
            'name'             =>        "required|max:191|unique:padeaf_web.sm_donor,name,{$donor->id}",
            'image'            =>        'nullable|image',
        ]);

        // $input = $request->except('_token','site_logo');

        $donor->name = $request->name;
        if($request->image)
        {
            Storage::disk('padeaf')->delete($donor->image);
            $donor->image = Storage::disk('padeaf')->putFile('',$request->image);
        }
         $donor->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('donor');
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

        $item = Donor::find($id);

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
        $user = Donor::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Category has faq\'s assigned to it.';
            return response()->json($response, 409);
        } else {
            Storage::disk('padeaf')->delete($user->image);
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
