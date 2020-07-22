<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Term;
use Illuminate\Http\Request;
use DataTables;
use DB;
class TermsController extends Controller
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

        return view('cms.term.term', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        // $roles = Network::select(['id','name', 'status']);
        $roles = Term::select(['id','start_year','end_year', 'status']);

        return DataTables::of($roles)->make();
    }

    /**
     * the ajax validator for this controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    // public function validater(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => "required|max:191|unique:term,name,{$id}"
    //     ]);

    //     return response()->json(['success'], 200);
    // }

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

        return view('cms.term.add-term', $data);
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
            'start_year' => 'required|max:191|unique:padeaf_web.terms',
            'end_year'   => 'required|max:191|unique:padeaf_web.terms'
        ]);

        Term::create($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('term');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Term  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        $data = [
            'term' => $term,
            'isEdit' => true,
        ];

        return view('cms.term.add-term', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Term  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Term $term)
    {
        $request->validate([
            'start_year' => "required|max:191|unique:padeaf_web.terms",
            'end_year'   => "required|max:191|unique:padeaf_web.terms"
        ]);

        $term->start_year = $request->start_year;
        $term->end_year = $request->end_year;
        $term->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('term');
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

        $item = Term::find($id);

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
        $user = Term::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Term has something assigned to it.';
            return response()->json($response, 409);
        } else {
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }

}
