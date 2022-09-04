<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Category;
use App\Repositories\Portfolio;
use App\Repositories\Tag;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $portfolios = Portfolio::get();
            return view('admin.portfolio.index',compact('portfolios'));

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
            $error = [];
            return view('admin.portfolio.create',compact('error','categories','tags'));
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

                $image = Portfolio::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'link' => $request->link ?? null,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            $portfolio = Portfolio::save($data);

            if($portfolio['data']['status'] === 'error'){

                $categories = Category::isActive(['is_active'=>1]);
                $tags = Tag::isActive(['is_active'=>1]);
                $error = $portfolio['data']['data'];
                $data = $request->all();

                return view('admin.portfolio.create',compact('portfolio','error','categories','tags', 'data'));
            }


            return redirect()->route('admin.portfolios.index')
                ->with('success','Portfolio added successfully');

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
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $portfolio = Portfolio::first($id,'id','tags');
            return view('admin.portfolio.show',compact('portfolio'));

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
     * @param  \App\Models\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $categories = Category::isActive(['is_active'=>1]);
            $tags = Tag::isActive(['is_active'=>1]);
            $error = [];
            $portfolio = Portfolio::first($id,'id','tags');

            return view('admin.portfolio.edit',compact('portfolio','error','categories','tags'));

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
     * @param  \App\Models\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';
            if($request->file('image')){

                $image = Portfolio::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }
            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'link' => $request->link ?? null,
                'description' => $request->description ?? null,
                'is_active' => $request->is_active,
                'image' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['image']);
            }

            $portfolio = Portfolio::update($id, $data);

            if($portfolio['data']['status'] === 'error'){

                $categories = Category::isActive(['is_active'=>1]);
                $tags = Tag::isActive(['is_active'=>1]);
                $error = $portfolio['data']['data'];
                $portfolio = Portfolio::first($id);
                $data = $request->all();

                return view('admin.portfolio.edit',compact('portfolio','error','categories','tags', 'data'));
            }

            return redirect()->route('admin.portfolios.index')
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
     * @param  \App\Models\Portfolio $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $portfolio = Portfolio::delete($id);

            if($portfolio['data']['status'] === 'error'){
                return back()->with('success', $portfolio['data']['data']);
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
