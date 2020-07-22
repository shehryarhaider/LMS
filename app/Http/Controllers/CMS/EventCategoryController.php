<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\EventCategory;
use Illuminate\Http\Request;
use DataTables;
use DB;
class EventCategoryController extends Controller
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

        return view('cms.event_category.event_category', $data);
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
        $roles = EventCategory::select(['id','name','status']);

        return DataTables::of($roles)->make();
    }

    /**
     * the ajax validator for this controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function validater(Request $request, $id)
    {
        $request->validate([
            'name' => "required|max:191|unique:padeaf_web.mf_event_categories,name,{$id}"
        ]);

        return response()->json(['success'], 200);
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

        return view('cms.event_category.add', $data);
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
            'name' => 'required|max:191|unique:padeaf_web.mf_event_categories,name',
        ]);

        $event_categories = new EventCategory;
        $event_categories->name = $request->name;
        $event_categories->save();
        // form helpers.php
        logAction($request);

        return redirect()->route('event_categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventCategory $event_categories)
    {
        $data = [
            'event_categories' => $event_categories,
            'isEdit'           => true,
        ];

        return view('cms.event_category.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,EventCategory $event_categories)
    {
        $request->validate([
            'name' => "required|max:191|unique:padeaf_web.mf_event_categories,name,{$event_categories->id}"
        ]);
        $event_categories->name = $request->name;
        $event_categories->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('event_categories');
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

        $item = EventCategory::find($id);

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
        $user = EventCategory::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Network has something assigned to it.';
            return response()->json($response, 409);
        } else {
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
