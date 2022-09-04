<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;

use App\Repositories\Blog\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $posts = Post::get([], ['comments']);
            return response()->json($posts);

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if($request->file('image')){

                $image = post::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'title' => $request->title,
                'slug' => $request->slug ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            $post = Post::save($data);
            return response()->json($post);

            return [
                'status' => 'error',
                'data' => 'You must need to attach an image'
            ];


        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if($request->file('image')){

                $image = post::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'title' => $request->title,
                'slug' => $request->slug ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            $post = Post::update($id,$data);
            return response()->json($post);

            return [
                'status' => 'error',
                'data' => 'You must need to attach an image'
            ];


        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::delete($id);
            return response()->json($post);

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
