<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $categories = Category::get();
            return view('admin.category.index',compact('categories'));

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
        $category = null;
        $error = [];
        return view('admin.category.create',compact('category','error'));
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

            $category = Category::save($data);
            if($category['status'] === 'error'){
                $error = $category['data'];
                $category = null;
                $data = $request->all();
                return view('admin.category.create',compact('category','error','data'));
            }

            return redirect()->route('admin.categories.index')
                             ->with('success','Category added successfully');

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
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $category = Category::first($id);
            return view('admin.category.edit',compact('category','error'));

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
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'is_active' => $request->is_active,
            ];

            $category = Category::update($id, $data);
            if($category['status'] === 'error'){
                $error = $category['data'];
                $category = Category::first($id);
                $data = $request->all();
                return view('admin.category.edit',compact('category','error','data'));
            }

            return redirect()->route('admin.categories.index')
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
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::delete($id);
            if($category['status'] === 'error'){
                return back()->with('success', $category['data']);
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
