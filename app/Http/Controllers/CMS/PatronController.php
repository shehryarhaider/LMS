<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Patron;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
class PatronController extends Controller
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


        return view('cms.patron.patrons', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {

        // gets the selects colums only
        $patrons = DB::table('sm_patron')->select(['id','image','name','designation','status']);
        return DataTables::of($patrons)->make();
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

        return view('cms.patron.add-patron', $data);
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

            'image'         =>       'required|image',
            'name'          =>       "required|unique:sm_patron,name",
            'designation'   =>       "required|unique:sm_patron,designation",

        ]);


        $patron                         =       new Patron;
        $patron->name                   =       $request->name;
        $patron->designation            =       $request->designation;

        if ($request->image) {
            $patron->image = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $patron->save();
       return redirect()->route('padeaf.patrons');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Patron $patron)
    {
        $data = [
            'patron'       => $patron,
            'isEdit'       => true,
        ];

        return view('cms.patron.add-patron', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Patron $patron){

        $request->validate([

            'name'          =>       "required|max:191|unique:sm_patron,name,{$patron->id}",
            'designation'   =>       "required|max:191|unique:sm_patron,designation,{$patron->id}"

        ]);

        // $input = $request->except('_token','site_logo');

        if($request->image)
        {
            Storage::disk('padeaf')->delete($patron->image);
            $patron->image = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $patron->name                   =       $request->name;
        $patron->designation            =       $request->designation;


        $patron->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('padeaf.patrons');
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

        $item = Patron::find($id);

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
        $user = Patron::findOrFail($request->id);

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
