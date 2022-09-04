<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $tags = Tag::get();
            return view('admin.tag.index',compact('tags'));

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
        $tag = null;
        $error = [];
        return view('admin.tag.create',compact('tag','error'));
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
                'name' => $request->name,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
            ];

            $tag = Tag::save($data);

            if($tag['status'] === 'error'){
                $error = $tag['data'];
                $tag = null;
                $data = $request->all();
                return view('admin.tag.create',compact('tag','error','data'));
            }

            return redirect()->route('admin.tags.index')
                ->with('success','Added successfully');

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
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error=[];
            $tag = Tag::first($id);
            return view('admin.tag.edit',compact('tag','error'));

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
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'name' => $request->name,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
            ];

            $tag = Tag::update($id, $data);

            if($tag['status'] === 'error'){
                $error = $tag['data'];
                $tag = Tag::first($id);
                $data = $request->all();
                return view('admin.tag.edit',compact('tag','error','data'));
            }

            return redirect()->route('admin.tags.index')
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
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tag = Tag::delete($id);
            if($tag['status'] === 'error'){
                return back()->with('success', $tag['data']);
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
