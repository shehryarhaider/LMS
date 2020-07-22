<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class InaugurationImageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $data = CMS::where('type',11)->select(['id','icon','text','status']);

        return DataTables::of($data)->make();
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

        return view('cms.pages.inauguration.image_section.add', $data);
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
            'text'      =>  'required',
            'image'     =>  'required',
        ]);

        $cms    =   new CMS;

        if($request->image){
            $cms->icon = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $cms->text  =   $request->text;
        $cms->type  =   11;
        $cms->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('padeaf.inauguration');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CMS  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CMS $cms)
    {
        $data = [
            'image_section'      =>     $cms,
            'isEdit'             =>     true,
        ];

        return view('cms.pages.inauguration.image_section.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CMS  $id
     * @return \Illuminate\Http\Response\
     */
    public function update(Request $request,CMS $cms)
    {
        $request->validate([
            'text'      =>  'required',
            'image'     =>  'required',
        ]);

        if($request->image){
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $cms->text  =   $request->text;
        $cms->type  =   11;
        $cms->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('padeaf.inauguration');
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

        $item = CMS::find($id);

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
        $below_list = CMS::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Content has something assigned to it.';
            return response()->json($response, 409);
        } else {
            Storage::disk('padeaf')->delete($below_list->icon);
            $response = $below_list->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
