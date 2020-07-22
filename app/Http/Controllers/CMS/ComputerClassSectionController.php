<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\CMS;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ComputerClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $data = CMS::where('type',19)->select(['id','icon','text','status']);

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

        return view('cms.pages.computer_class.image_section.add', $data);
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
        ]);

        $cms    =   new CMS;
        $cms->text   =   $request->text;
        if($request->image){
            $cms->icon = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $cms->type      =   19;
        $cms->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('padeaf.computer_class');
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
            'computer_class_image_section'   =>     $cms,
            'isEdit'                        =>     true,
        ];

        return view('cms.pages.computer_class.image_section.add', $data);
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
            'text'     =>  'required',
        ]);
        $cms->text   =   $request->text;
        if($request->image){
            Storage::disk('padeaf')->delete($cms->icon);
            $cms->icon = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $cms->type      =   19;
        $cms->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('padeaf.computer_class');
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
