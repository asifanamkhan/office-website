<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\Comment;
use App\Repositories\Blog\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $comments = Comment::get([],'post');
            return view('admin.blog.comment.index',compact('comments'));

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
        $comment = null;
        $posts = Post::isActive(['is_active'=>1]);
        $error = [];
        return view('admin.blog.comment.create',compact('comment','error','posts'));
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

            $data = [
                'post_id' => $request->post_id,
                'comment' => $request->comment,
                'is_active' => $request->is_active,
            ];

            $comment = Comment::save($data);
            if($comment['status'] === 'error'){
                $error = $comment['data'];
                $comment = null;
                $posts = Post::isActive(['is_active'=>1]);
                $data = $request->all();
                return view('admin.blog.comment.create',compact('comment','error','posts','data'));
            }

            return redirect()->route('admin.comments.index')
                ->with('success','Comment added successfully');

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
     * @param  \App\Models\Blog\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $comment = comment::first($id);
            $posts = Post::isActive(['is_active'=>1]);
            return view('admin.blog.comment.edit',compact('comment','error','posts'));

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
     * @param  \App\Models\Blog\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'post_id' => $request->post_id,
                'comment' => $request->comment,
                'is_active' => $request->is_active,
            ];

            $comment = Comment::update($id, $data);
            if($comment['status'] === 'error'){
                $error = $comment['data'];
                $comment = Comment::first($id);
                $posts = Post::isActive(['is_active'=>1]);
                $data = $request->all();
                return view('admin.blog.comment.edit',compact('comment','error','posts','data'));
            }

            return redirect()->route('admin.comments.index')
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
     * @param  \App\Models\Blog\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = Comment::delete($id);
            if($comment['status'] === 'error'){
                return back()->with('success', $comment['data']);
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
