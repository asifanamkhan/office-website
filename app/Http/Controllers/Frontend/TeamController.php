<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Team;
use App\Repositories\Tech;
use App\Repositories\Setting;


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

            $team = Team::isActive(['is_active'=>1]);
            $tech = Tech::isActive(['is_active'=>1]);
            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }

            if($team['status'] == 'success'){
                $team = $team['data'];
            }

            if($tech['status'] == 'success'){
                $tech = $tech['data'];
            }

            return view('team',compact('team', 'tech','setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }
}
