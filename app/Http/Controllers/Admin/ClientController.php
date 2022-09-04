<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $clients = Client::get();
            return view('admin.client.index',compact('clients'));

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
        $client = null;
        $error = [];
        return view('admin.client.create',compact('client','error'));
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

                $image = Client::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'name' => $request->name,
                'company' => $request->company ?? null,
                'email' => $request->email,
                'phone' => $request->phone ?? null,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            $client = Client::save($data);

            if($client['status'] === 'error'){

                $error = $client['data'];
                $client = null;
                $data = $request->all();
                return view('admin.client.create',compact('client','error','data'));
            }

            return redirect()->route('admin.clients.index')
                ->with('success','Client added successfully');

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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $client = Client::first($id);
            return view('admin.client.show',compact('client'));

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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $client = Client::first($id);
            return view('admin.client.edit',compact('client','error'));

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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';

            if($request->file('image')){

                $image = Client::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            $data = [
                'name' => $request->name,
                'company' => $request->company ?? null,
                'email' => $request->email,
                'phone' => $request->phone ?? null,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'description' => $request->description ?? null,
                'image' => $image['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['image']);
            }

            $client = Client::update($id, $data);

            if($client['status'] === 'error'){
                $error = $client['data'];
                $client = Client::first($id);
                $data = $request->all();
                return view('admin.client.edit',compact('client','error','data'));
            }

            return redirect()->route('admin.clients.index')
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
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = Client::delete($id);

            if($client['status'] === 'error'){
                return back()->with('success', $client['data']);
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
