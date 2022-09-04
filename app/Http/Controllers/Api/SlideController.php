<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Repositories\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $slides = Slide::get();
            return response()->json($slides);

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

                $image = Slide::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }

                $data = [
                    'title' => $request->title ?? null,
                    'description' => $request->description ?? null,
                    'image' => $image['data'] ,
                ];

                $slide = Slide::save($data);
                return response()->json($slide);
            }

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
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if($request->file('image')){

                $image = Slide::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }

                $data = [
                    'title' => $request->title ?? null,
                    'description' => $request->description ?? null,
                    'image' => $image['data'] ,
                ];

                $slide = Slide::update($id, $data);
                return response()->json($slide);
            }

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
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $slide = Slide::delete($id);
            return response()->json($slide);

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
