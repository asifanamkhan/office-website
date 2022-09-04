<?php

namespace App\Http\Controllers\Api;

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
            return response()->json($services);

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

                $image = Service::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'image' => $image['data'] ?? null,
                'title' => $request->title,
                'description' => $request->description ,
            ];

            $service = Service::save($data);
            return response()->json($service);



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
    public function edit(Service $service)
    {
        //
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

            if($request->file('image')){

                $image = Service::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'image' => $image['data'] ?? null,
                'title' => $request->title,
                'description' => $request->description,
            ];

            $service = Service::update($id,$data);
            return response()->json($service);

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
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $service = Service::delete($id);
            return response()->json($service);

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
