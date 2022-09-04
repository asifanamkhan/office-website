<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $newsletters = Newsletter::get();
            return view('admin.newsletter.index',compact('newsletters'));

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
        $newsletter = null;
        $error = [];
        return view('admin.newsletter.create',compact('newsletter','error'));
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
                'name' => $request->name ?? null,
                'email' => $request->email,
                'phone' => $request->phone ?? null,
                'address' => $request->address ?? null,
                'is_active' => $request->is_active,
                'is_promotion' => $request->is_promotion ?? null,
                'is_discount' => $request->is_discount ?? null,
            ];

            $newsletter = Newsletter::save($data);
            if($newsletter['status'] === 'error'){
                $error = $newsletter['data'];
                $newsletter = null;
                $data = $request->all();
                return view('admin.newsletter.create',compact('newsletter','error','data'));
            }

            return redirect()->route('admin.newsletters.index')
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
     * @param  \App\Models\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $newsletter = Newsletter::first($id);
            return view('admin.newsletter.show',compact('newsletter'));

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
     * @param  \App\Models\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error=[];
            $newsletter = Newsletter::first($id);
            return view('admin.newsletter.edit',compact('newsletter','error'));

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
     * @param  \App\Models\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'name' => $request->name ?? null,
                'email' => $request->email ?? null,
                'phone' => $request->phone ?? null,
                'address' => $request->address ?? null,
                'is_active' => $request->is_active,
                'is_promotion' => $request->is_promotion ?? null,
                'is_discount' => $request->is_discount ?? null,
            ];

            $newsletter = Newsletter::update($id, $data);

            if($newsletter['status'] === 'error'){
                $error = $newsletter['data'];
                $newsletter = Newsletter::first($id);
                $data = $request->all();
                return view('admin.newsletter.edit',compact('newsletter','error','data'));
            }

            return redirect()->route('admin.newsletters.index')
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
     * @param  \App\Models\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $newsletter = Newsletter::delete($id);
            if($newsletter['status'] === 'error'){
                return back()->with('success', $newsletter['data']);
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
