<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Category;
use App\Repositories\Portfolio;
use App\Repositories\Setting;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $portfolio = Portfolio::isActive(['is_active'=>1]);
            $category = Category::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);
            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($portfolio['status'] === 'success'){
                $portfolio = $portfolio['data'];
            }

            if($category['status'] == 'success'){
                $category = $category['data'];
            }

            return view('portfolio.index',compact('portfolio','category','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
