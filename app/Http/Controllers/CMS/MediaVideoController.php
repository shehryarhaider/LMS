<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use DataTables;
use DB;
class MediaVideoController extends Controller
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

        return view('cms.media_videos.videos', $data);
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
        $roles = Video::select(['id','name','text', 'status']);

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
            'name' => "required|max:191|unique:sm_videos,name,{$id}"
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

        return view('cms.media_videos.add-videos', $data);
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
            'name' => 'required|max:191|unique:sm_videos,name',
            'text' => "required|max:191|unique:sm_videos,text,"
        ]);

        Video::create($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('media_videos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $media_videos)
    {
        $data = [
            'videos' => $media_videos,
            'isEdit' => true,
        ];

        return view('cms.media_videos.add-videos', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Video $media_videos)
    {
        $request->validate([
            'name' => "required|max:191|unique:sm_videos,name,{$media_videos->id}",
            'text' => "required|max:191|unique:sm_videos,text,{$media_videos->id}"
        ]);


        $media_videos->name = $request->name;
        $media_videos->text = $request->text;
        $media_videos->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('media_videos');
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

        $item = Video::find($id);

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
        $user = Video::findOrFail($request->id);

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
