<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $testimonials = Testimonial::get();
            return view('admin.testimonial.index',compact('testimonials'));

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
        $testimonial = null;
        $error = [];
        return view('admin.testimonial.create',compact('testimonial','error'));
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

                $image = Testimonial::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'name' => $request->name,
                'company' => $request->company ?? null,
                'rating' => $request->rating ?? null,
                'is_active' => $request->is_active,
                'review' => $request->review,
                'logo' => $image['data'] ?? null,
            ];

            $testimonial = Testimonial::save($data);

            if($testimonial['status'] === 'error'){

                $error = $testimonial['data'];
                $testimonial = null;
                $data = $request->all();
                return view('admin.testimonial.create',compact('testimonial','error','data'));
            }

            return redirect()->route('admin.testimonials.index')
                ->with('success','Testimonial added successfully');

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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $testimonial = Testimonial::first($id);
            return view('admin.testimonial.show',compact('testimonial'));

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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $testimonial = Testimonial::first($id);
            return view('admin.testimonial.edit',compact('testimonial','error'));

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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';
            if($request->file('image')){

                $image = Testimonial::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }
            $data = [
                'name' => $request->name,
                'company' => $request->company ?? null,
                'rating' => $request->rating ?? null,
                'is_active' => $request->is_active,
                'review' => $request->review,
                'logo' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['logo']);
            }

            $testimonial = Testimonial::update($id, $data);

            if($testimonial['status'] === 'error'){
                $error = $testimonial['data'];
                $testimonial = Testimonial::first($id);
                $data = $request->all();
                return view('admin.testimonial.edit',compact('testimonial','error','data'));
            }

            return redirect()->route('admin.testimonials.index')
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
     * @param  \App\Models\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::delete($id);

            if($testimonial['status'] === 'error'){
                return back()->with('success', $testimonial['data']);
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
