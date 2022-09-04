<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Tech;
use Illuminate\Http\Request;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $techs = Tech::get();
            return view('admin.tech.index',compact('techs'));

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
        $tech = null;
        $error = [];
        return view('admin.tech.create',compact('tech','error'));
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
                'skill_level' => $request->skill_level,
                'is_active' => $request->is_active ,
                'description' => $request->description ?? null,
            ];

            $tech = Tech::save($data);

            if($tech['status'] === 'error'){
                $error = $tech['data'];
                $tech = null;
                $data = $request->all();
                return view('admin.tech.create',compact('tech','error','data'));
            }

            return redirect()->route('admin.techs.index')
                ->with('success','Tech added successfully');

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
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function show(Tech $tech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $tech = tech::first($id);
            return view('admin.tech.edit',compact('tech','error'));

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
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = [
                'name' => $request->name,
                'skill_level' => $request->skill_level,
                'is_active' => $request->is_active ,
                'description' => $request->description ?? null,
            ];

            $tech = Tech::update($id, $data);
            if($tech['status'] === 'error'){
                $error = $tech['data'];
                $tech = Tech::first($id);
                $data = $request->all();
                return view('admin.tech.edit',compact('tech','error','data'));
            }

            return redirect()->route('admin.techs.index')
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
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tech = Tech::delete($id);
            if($tech['status'] === 'error'){
                return back()->with('success', $tech['data']);
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
