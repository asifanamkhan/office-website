<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Setting;


class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy()
    {
        try {

            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] === 'success'){
                $setting = $setting['data'];
            }
            return view('privacy-policy',compact('setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }

    public function terms(){
        try {

            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] === 'success'){
                $setting = $setting['data'];
            }
            return view('terms',compact('setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
