<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $services = Service::get();
            return view('admin.service.index',compact('services'));

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
        $service = null;
        $error = [];
        return view('admin.service.create',compact('service','error'));
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

                $image = Service::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'title' => $request->title ?? null,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            $service = Service::save($data);

            if($service['status'] === 'error'){

                $error = $service['data'];
                $service = null;
                $data = $request->all();
                return view('admin.service.create',compact('service','error','data'));
            }

            return redirect()->route('admin.services.index')
                             ->with('success','Service added successfully');

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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $service = Service::first($id);
            return view('admin.service.edit',compact('service','error'));

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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $image = '';
            if($request->file('image')){

                $image = Service::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }
            $data = [
                'title' => $request->title ?? null,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['image']);
            }

            $service = Service::update($id, $data);

            if($service['status'] === 'error'){
                $error = $service['data'];
                $service = Service::first($id);
                $data = $request->all();
                return view('admin.service.edit',compact('service','error','data'));
            }

            return redirect()->route('admin.services.index')
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
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $service = Service::delete($id);

            if($service['status'] === 'error'){
                return back()->with('success', $service['data']);
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
