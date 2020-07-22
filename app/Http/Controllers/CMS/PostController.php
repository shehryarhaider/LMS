<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\BlogCategory;
use DataTables;
use File;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //getCurrentMenuIdByRouteName used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        $data['category'] = BlogCategory::all();

        return view('cms.blog.post', $data);
    }

    /**
     * validates the slug
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function validater(Request $request,$id)
    {
        $request->validate([
            'slug' => "regex:[^[a-z]+(-[a-z]+)*$]|unique:posts,slug,{$id}"
        ]);

        return response()->json(['success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        $post = Post::with(['category' => function ($query) {
            $query->select('id', 'name');
        }])->select(['posts.id','heading', 'blog_category_id' , 'description', 'posts.status','featured']);

        return DataTables::of($post)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'isEdit' => false,
            'category' => BlogCategory::where('status',1)->get(),
        ];

        return view('cms.blog.add-post', $data);
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
            'featured_image'    => 'required|image',
            'blog_category_id'  => 'required|exists:blog_categories,id',
            'heading'           => 'required',
            'text'              => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'slug'              => 'regex:[^[a-z]+(-[a-z]+)*$]|unique:posts,slug',
        ]);

        $input = $request->except('_token','featured_image');

        if ($request->featured_image) {
            $input['featured_image'] = Storage::disk('padeaf')->putFile('', $request->featured_image);
        }

        Post::create($input);

        // form helpers.php
        logAction($request);

        return redirect()->route('blog.post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post,
            'isEdit' => true,
            'category' => BlogCategory::where('status',1)->get(),
        ];

        return view('cms.blog.add-post', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'featured_image'    => 'nullable|image',
            'blog_category_id'  => 'required|exists:blog_categories,id',
            'heading'           => 'required',
            'text'              => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'slug'              => "regex:[^[a-z]+(-[a-z]+)*$]|unique:posts,slug,{$post->id}",
        ]);

        $input = $request->except('_token','featured_image');

        if ($request->featured_image) {
            Storage::disk('padeaf')->delete($post->featured_image);

            $input['featured_image'] = Storage::disk('padeaf')->putFile('', $request->featured_image);
        }

        $post->update($input);

        // form helpers.php
        logAction($request);

        return redirect()->route('blog.post');
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

        $item = Post::find($id);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function featured(Request $request)
    {
        $response['status'] = false;
        $response['message'] = 'Oops! Something went wrong.';

        $id = $request->input('id');
        $status = $request->input('status');

        $item = Post::find($id);

        if ($item->update(['featured' => $status])) {

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
        $post = Post::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This post has Cases assgined to it';
            return response()->json($response, 409);
        } else {
            Storage::disk('gcs')->delete('bryt/'.$post->featured_image);

            $response = $post->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
