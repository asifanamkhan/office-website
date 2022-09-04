<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Service;
use App\Repositories\Setting;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $service = Service::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($service['status'] == 'success'){
                $service = $service['data'];
            }

            return view('service.index',compact('service','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    public function show($id){
        try{
            $service = Service::first($id);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($service['status'] == 'success'){
                $service = $service['data'];
            }

            return view('service.show',compact('service','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
