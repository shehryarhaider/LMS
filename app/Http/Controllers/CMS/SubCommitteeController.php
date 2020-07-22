<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\SubCommittee;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
use Session;

class SubCommitteeController extends Controller
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


        return view('cms.sub_committee.sub-committee', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable($term)
    {
        // gets the selects colums only
        $sub_committee = SubCommittee::where('term_id',$term)->select(['id','image','name','designation','status'])->get();
        return DataTables::of($sub_committee)->make();
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

        return view('cms.sub_committee.add-sub-committee', $data);
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
            'name'          =>       "required|unique:padeaf_web.term_sub_committee,name",
            'designation'   =>       "required|unique:padeaf_web.term_sub_committee,designation",

        ]);


        $sub_committee                         =       new SubCommittee;
        $sub_committee->name                   =       $request->name;
        $sub_committee->designation            =       $request->designation;
        $sub_committee->term_id                =       $term;

        if ($request->image) {
            $sub_committee->image = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $sub_committee->save();

       return redirect()->route('sub_committee',[Session::get('term_id')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($term,SubCommittee $sub_committee)
    {
        $data = [
            'sub_committee'       =>   $sub_committee,
            'isEdit'              => true,
        ];

        return view('cms.sub_committee.add-sub-committee', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$term,SubCommittee $sub_committee){

        $request->validate([

            'name'          =>       "required|max:191|unique:padeaf_web.term_sub_committee,name,{$sub_committee->id}",
            'designation'   =>       "required|max:191|unique:padeaf_web.term_sub_committee,designation,{$sub_committee->id}"

        ]);

        // $input = $request->except('_token','site_logo');

        if($request->image)
        {
            Storage::disk('padeaf')->delete($sub_committee->image);
            $sub_committee->image = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $sub_committee->name                   =       $request->name;
        $sub_committee->designation            =       $request->designation;


        $sub_committee->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('sub_committee',$term);
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

        $item = SubCommittee::find($id);

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
        $user = SubCommittee::findOrFail($request->id);

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
