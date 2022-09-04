<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;

use App\Repositories\Category;
use App\Repositories\Blog\Post;
use App\Repositories\Tag;
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

            $posts = Post::get([],['category']);
            return view('admin.blog.post.index',compact('posts'));

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
        try{
            $categories = Category::isActive(['is_active'=>1]);
            $tags = Tag::isActive(['is_active'=>1]);
            $post = null;
            $error = [];
            return view('admin.blog.post.create',compact('post','error','categories','tags'));
        }
        catch (\Exception $exception){
            return [
                'status' => 'error',
                'data' => $exception->getMessage()
            ];
        }

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

                $image = Post::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'slug' => $request->slug,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            $post = Post::save($data);

            if($post['data']['status'] === 'error'){

                $categories = Category::isActive(['is_active'=>1]);
                $tags = Tag::isActive(['is_active'=>1]);
                $error = $post['data']['data'];
                $post = null;
                $data = $request->all();
                return view('admin.blog.post.create',compact('post','error','categories','tags','data'));
            }


            return redirect()->route('admin.posts.index')
                ->with('success','Post added successfully');

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
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = Post::first($id,'id','tags');
            return view('admin.blog.post.show',compact('post'));

        }
        catch (\Exception $exception){
            return [
                'status' => 'error',
                'data' => $exception->getMessage()
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::isActive(['is_active'=>1]);
            $tags = Tag::isActive(['is_active'=>1]);
            $error = [];
            $post = Post::first($id,'id','tags');
            return view('admin.blog.post.edit',compact('post','error','categories','tags'));

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';
            if($request->file('image')){

                $image = Post::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'slug' => $request->slug,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['image']);
            }

            $post = Post::update($id, $data);

            if($post['data']['status'] === 'error'){

                $categories = Category::isActive(['is_active'=>1]);
                $tags = Tag::isActive(['is_active'=>1]);
                $error = $post['data']['data'];
                $post = Post::first($id);
                $data = $request->all();
                return view('admin.blog.post.edit',compact('post','error','categories','tags','data'));
            }

            return redirect()->route('admin.posts.index')
                ->with('success','Successfully edited');


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
     * @param  \App\Models\Blog\Post $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::delete($id);

            if($post['status'] === 'error'){
                return back()->with('success', $post['data']);
            }

            return back()->with('success', 'Deleted Successfully');

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
