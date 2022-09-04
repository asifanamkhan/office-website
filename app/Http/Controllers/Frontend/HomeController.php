<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\About;
use App\Repositories\Category;
use App\Repositories\Client;
use App\Repositories\Portfolio;
use App\Repositories\Service;
use App\Repositories\Slide;
use Illuminate\Http\Request;
use App\Repositories\Setting;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $slides = Slide::isActive(['is_active'=>1]);
            $about = About::isActive(['is_active'=>1]);
            $service = Service::isActive(['is_active'=>1]);
            $category = Category::isActive(['is_active'=>1]);
            $portfolio = Portfolio::isActive(['is_active'=>1]);
            $client = Client::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($slides['status'] == 'success'){
                $slides = $slides['data'];
            }

            if($about['status'] == 'success'){
                $about = $about['data'];
            }

            if($service['status'] == 'success'){
                $service = $service['data'];
            }

            if($category['status'] == 'success'){
                $category = $category['data'];
            }

            if($portfolio['status'] == 'success'){
                $portfolio = $portfolio['data'];
            }

            if($client['status'] == 'success'){
                $client = $client['data'];
            }

            return view('home',compact('slides','about','service',
                             'category','portfolio','client','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }
}
