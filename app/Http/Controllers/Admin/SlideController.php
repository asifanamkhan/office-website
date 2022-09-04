<?php

namespace App\Http\Controllers\Admin;

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
            return view('admin.slide.index',compact('slides'));

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
        $slide = null;
        $error = [];
        return view('admin.slide.create',compact('slide','error'));
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

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }

                $data = [
                    'title' => $request->title ?? null,
                    'description' => $request->description ?? null,
                    'is_active' => $request->is_active,
                    'image' => $image['data'] ,
                ];

                $slide = Slide::save($data);

                if($slide['status'] === 'error'){
                    $slide = null;
                    $error = $slide['data'];
                    $data = $request->all();
                    return view('admin.slide.create',compact('slide','error','data'))
                            ->with('warning',$error);
                }

                return redirect()->route('admin.slides.index')
                                 ->with('success','Slide added successfully');
            }

            return back()->with('warning','You must need attached an image');

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
    public function edit($id)
    {
        try {

            $slide = Slide::first($id);
            $error = [];
            return view('admin.slide.edit',compact('slide','error'));

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
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if($request->file('image')){

                $image = Slide::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }

                $data = [
                    'title' => $request->title ?? null,
                    'description' => $request->description ?? null,
                    'is_active' => $request->is_active,
                    'image' => $image['data'] ,
                ];

            }else{
                $data = [
                    'title' => $request->title ?? null,
                    'description' => $request->description ?? null,
                    'is_active' => $request->is_active,
                ];
            }

            $slide = Slide::update($id, $data);

            if($slide['status'] === 'error'){
                $slide = Slide::first($id);
                $error = $slide['data'];
                $data = $request->all();
                return view('admin.slide.edit',compact('slide','error','data'));
            }

            return redirect()->route('admin.slides.index')
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
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $slide = Slide::delete($id);

            if($slide['status'] === 'error'){
                return back()->with('success', $slide['data']);
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
