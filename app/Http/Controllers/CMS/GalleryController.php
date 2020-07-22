<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Gallery;
use Illuminate\Http\Request;
use DataTables;
use App\EventCategory;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
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

        return view('cms.gallery.gallery', $data);
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
        $roles = Gallery::with('eventCategory')->select(['id','image','mf_event_category_id', 'status']);

        return DataTables::of($roles)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'event_category'    => EventCategory::where('status',1)->get(), 
            'isEdit'            => false,
        ];

        return view('cms.gallery.add', $data);
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
            'event_category'    => "required",
            'image'             => 'required',
        ]);

        $gallery = new Gallery;
        if($request->image)
        {
            $gallery->image = Storage::disk('padeaf')->putFile('',$request->image);
        }
        $gallery->mf_event_category_id = $request->event_category;
        $gallery->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('gallery');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $data = [
            'event_category'    =>      EventCategory::where('status',1)->get(),
            'gallery'           =>      $gallery,
            'isEdit'            =>      true,
        ];

        return view('cms.gallery.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Network  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Gallery $gallery)
    {
        $request->validate([
            'event_category'    => "required",
        ]);

        if($request->image)
        {
            Storage::disk('padeaf')->delete($gallery->image);
            $gallery->image = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $gallery->mf_event_category_id = $request->event_category;
        $gallery->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('gallery');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $response['status']  = false;
        $response['message'] = 'Oops! Something went wrong.';

        $id = $request->input('id');
        $status = $request->input('status');

        $item = Gallery::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status']  = true;
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
        $gallery = Gallery::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Network has something assigned to it.';
            return response()->json($response, 409);
        } else {
            Storage::disk('padeaf')->delete($gallery->image);
            $response = $gallery->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
