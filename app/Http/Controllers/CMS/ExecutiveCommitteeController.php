<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\ExecutiveCommittee;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
use Session;

class ExecutiveCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $term)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);
        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        Session::put('term_id', $term);


        return view('cms.executive_committee.executive-committee', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable($term)
    {
        // gets the selects colums only
        $executive_committee = ExecutiveCommittee::where('term_id',$term)->select(['id','image','name','designation','status'])->get();

        return DataTables::of($executive_committee)->make();
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

        return view('cms.executive_committee.add-executive-committee', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $term)
    {
        $request->validate([

            'image'         =>       'required|image',
            'name'          =>       "required|unique:padeaf_web.term_executive_committee,name",
            'designation'   =>       "required|unique:padeaf_web.term_executive_committee,designation",

        ]);


        $executive_committee                         =       new ExecutiveCommittee;
        $executive_committee->name                   =       $request->name;
        $executive_committee->designation            =       $request->designation;
        $executive_committee->term_id                =       $term;

        if ($request->image) {
            $executive_committee->image = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $executive_committee->save();

       return redirect()->route('executive_committee',[Session::get('term_id')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($term,ExecutiveCommittee $executive_committee)
    {
        $data = [
            'executive_committee'       =>   $executive_committee,
            'isEdit'       => true,
        ];

        return view('cms.executive_committee.add-executive-committee', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$term,ExecutiveCommittee $executive_committee){

        $request->validate([

            'name'          =>       "required|max:191|unique:padeaf_web.term_executive_committee,name,{$executive_committee->id}",
            'designation'   =>       "required|max:191|unique:padeaf_web.term_executive_committee,designation,{$executive_committee->id}"

        ]);

        // $input = $request->except('_token','site_logo');

        if($request->image)
        {
            Storage::disk('padeaf')->delete($executive_committee->image);
            $executive_committee->image = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $executive_committee->name                   =       $request->name;
        $executive_committee->designation            =       $request->designation;


        $executive_committee->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('executive_committee',$term);
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

        $item = ExecutiveCommittee::find($id);

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
        $user = ExecutiveCommittee::findOrFail($request->id);

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
