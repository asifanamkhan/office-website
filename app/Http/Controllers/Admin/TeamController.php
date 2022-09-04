<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $teams = Team::get();
            return view('admin.team.index',compact('teams'));

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
        $team = null;
        $error = [];
        return view('admin.team.create',compact('team','error'));
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

                $image = Team::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            $team = Team::save($data);

            if($team['status'] === 'error'){

                $error = $team['data'];
                $team = null;
                $data = $request->all();
                return view('admin.team.create',compact('team','error','data'));
            }

            return redirect()->route('admin.teams.index')
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
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $team = Team::first($id);
            return view('admin.team.show',compact('team'));

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
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $team = Team::first($id);
            return view('admin.team.edit',compact('team','error'));

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
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';
            if($request->file('image')){

                $image = Team::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }

            }

            $data = [
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['image']);
            }

            $team = Team::update($id, $data);

            if($team['status'] === 'error'){
                $error = $team['data'];
                $team = Team::first($id);
                $data = $request->all();
                return view('admin.team.edit',compact('team','error','data'));
            }

            return redirect()->route('admin.teams.index')
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
     * @param  \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $team = Team::delete($id);

            if($team['status'] === 'error'){
                return back()->with('success', $team['data']);
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
