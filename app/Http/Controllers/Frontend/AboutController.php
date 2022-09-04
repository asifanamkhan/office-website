<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\About;
use App\Repositories\Client;
use App\Repositories\Setting;
use App\Repositories\Team;
use App\Repositories\Tech;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $about = About::isActive(['is_active'=>1]);
            $client = Client::isActive(['is_active'=>1]);
            $team = Team::isActive(['is_active'=>1]);
            $tech = Tech::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($about['status'] == 'success'){
                $about = $about['data'];
            }

            if($client['status'] == 'success'){
                $client = $client['data'];
            }

            if($team['status'] == 'success'){
                $team = $team['data'];
            }

            if($tech['status'] == 'success'){
                $tech = $tech['data'];
            }

            return view('about',compact('about','client','team',
                'tech','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
