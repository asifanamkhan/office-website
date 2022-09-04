<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $abouts = About::get();
            return view('admin.about.index',compact('abouts'));

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
        $about = null;
        $error = [];
        return view('admin.about.create',compact('about','error'));
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
                'title' => $request->title,
                'sub_title' => $request->sub_title ?? null,
                'is_active' => $request->is_active,
                'description' => $request->description,
            ];

            $about = About::save($data);
            if($about['data']['status'] === 'error'){
                $error = $about['data']['data'];
                $data = $request->all();
                return view('admin.about.create',compact('about','error','data'));
            }

            return redirect()->route('admin.abouts.index')
                             ->with('success','About added successfully');

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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $about = about::first($id);
            return view('admin.about.edit',compact('about','error'));

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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'title' => $request->title,
                'sub_title' => $request->sub_title ?? null,
                'is_active' => $request->is_active,
                'description' => $request->description,
            ];

            $about = About::update($id, $data);

            if($about['data']['status'] === 'error'){
                $error = $about['data']['data'];
                $about = About::first($id);
                $data = $request->all();
                return view('admin.about.edit',compact('about','error','data'));
            }

            return redirect()->route('admin.abouts.index')
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $about = About::delete($id);
            if($about['status'] === 'error'){
                return back()->with('success', $about['data']);
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
