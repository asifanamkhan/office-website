<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Setting;
use App\Repositories\Testimonial;


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

            $testimonial = Testimonial::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($testimonial['status'] == 'success'){
                $testimonial = $testimonial['data'];
            }

            return view('testimonial',compact( 'testimonial','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }
}
