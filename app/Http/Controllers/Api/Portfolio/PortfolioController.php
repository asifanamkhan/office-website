<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;

use App\Repositories\Portfolio\Portfolio;
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
            return response()->json($portfolios);

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

                $image = Portfolio::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'category_id' => $request->category_id,
                'image' => $image['data'] ?? null,
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description ,
            ];

            $portfolio = Portfolio::save($data);
            return response()->json($portfolio);

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
     * @param  \App\Models\Portfolio\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $Portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $Portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if($request->file('image')){

                $image = Portfolio::image(['image'=> $request->file('image')]);

                if($image['status'] == 'error'){
                    return [
                        'status' => 'error',
                        'data' => $image['data']
                    ];
                }
            }

            $data = [
                'category_id' => $request->category_id,
                'image' => $image['data'] ?? null,
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description ,
            ];

            $portfolio = Portfolio::update($id,$data);
            return response()->json($portfolio);

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
     * @param  \App\Models\Portfolio\Portfolio $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $portfolio = Portfolio::delete($id);
            return response()->json($portfolio);

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
