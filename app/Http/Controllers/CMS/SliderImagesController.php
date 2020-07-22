<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\SliderImage;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
class SliderImagesController extends Controller
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


        return view('cms.slider_images.slider-image', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {

        // gets the selects colums only
        $slider_image = SliderImage::select(['id','heading','text','image','status']);
        return DataTables::of($slider_image)->make();
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

        return view('cms.slider_images.add-slider-image', $data);
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
            'heading'       =>       "required|unique:sm_slider_images,heading",
            'text'          =>       "required|unique:sm_slider_images,text",
            'button_text'   =>       "required|unique:sm_slider_images,button_text",
            'link'          =>       "required|unique:sm_slider_images,link",

        ]);


        $slider_image                  =       new SliderImage;
        $slider_image->heading         =       $request->heading;
        $slider_image->text            =       $request->text;
        $slider_image->button_text     =       $request->button_text;
        $slider_image->link            =       $request->link;

        if ($request->image) {
            $slider_image->image = Storage::disk('padeaf')->putFile('', $request->image);
        }
        $slider_image->save();
       return redirect()->route('slider_image');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(SliderImage $slider_image)
    {
        $data = [
            'slider_image' => $slider_image,
            'isEdit'       => true,
        ];

        return view('cms.slider_images.add-slider-image', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderImage  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SliderImage $slider_image)
    {
        $request->validate([
            'heading'       =>       "required|max:191|unique:sm_slider_images,heading,{$slider_image->id}",
            'text'          =>       "required|max:191|unique:sm_slider_images,text,{$slider_image->id}",
            'button_text'   =>       "required|max:191|unique:sm_slider_images,button_text,{$slider_image->id}",
            'link'          =>       "required|max:191|unique:sm_slider_images,link,{$slider_image->id}",
        ]);

        // $input = $request->except('_token','site_logo');

        if($request->image)
        {
            Storage::disk('padeaf')->delete($slider_image->image);
            $slider_image->image = Storage::disk('padeaf')->putFile('',$request->image);
        }

        $slider_image->heading          = $request->heading;
        $slider_image->text             = $request->text;
        $slider_image->button_text      = $request->button_text;
        $slider_image->link             = $request->link;

        $slider_image->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('slider_image');
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

        $item = SliderImage::find($id);

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
        $user = SliderImage::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Category has faq\'s assigned to it.';
            return response()->json($response, 409);
        } else {
            Storage::disk('padeaf')->delete($user->icon);
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
