<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $settings = Setting::get();
            return view('admin.setting.index',compact('settings'));

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
        $setting = null;
        $error = [];
        return view('admin.setting.create',compact('setting','error'));
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

                $image = Setting::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            if($request->file('favicon')){

                $favicon = Setting::image(['image'=> $request->file('favicon')]);

                if($favicon['status'] === 'error'){
                    return back()->with('warning',$favicon['data']['image'][0]);
                }
            }

            $data = [
                'name' => $request->name,
                'email_1' => $request->email_1,
                'email_2' => $request->email_2,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'google_location' => $request->google_location ?? null,
                'facebook_link' => $request->facebook_link ?? null,
                'youtube_link' => $request->youtube_link ?? null,
                'linkedin_link' => $request->linkedin_link ?? null,
                'instagram_link' => $request->instagram_link ?? null,
                'twitter_link' => $request->twitter_link ?? null,
                'skype_link' => $request->skype_link ?? null,
                'description' => $request->description ?? null,
                'logo' => $image['data'] ?? null,
                'favicon' => $favicon['data'] ?? null,
            ];
            //dd($data);
            $setting = Setting::save($data);
            //dd($setting);
            if($setting['data']['status'] === 'error'){

                $error = $setting['data']['data'];
                $setting = null;
                $data = $request->all();
                return view('admin.setting.create',compact('setting','error','data'));
            }

            return redirect()->route('admin.settings.index')
                ->with('success','added successfully');

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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $setting = Setting::first($id);
            return view('admin.setting.show',compact('setting'));

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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $error = [];
            $setting = Setting::first($id);
            return view('admin.setting.edit',compact('setting','error'));

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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $image = '';$favicon ='';
            if($request->file('image')){

                $image = Setting::image(['image'=> $request->file('image')]);

                if($image['status'] === 'error'){
                    return back()->with('warning',$image['data']['image'][0]);
                }
            }

            if($request->file('favicon')){

                $favicon = Setting::image(['image'=> $request->file('favicon')]);

                if($favicon['status'] === 'error'){
                    return back()->with('warning',$favicon['data']['image'][0]);
                }

            }

            $data = [
                'name' => $request->name,
                'email_1' => $request->email_1,
                'email_2' => $request->email_2,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'is_active' => $request->is_active,
                'address' => $request->address ?? null,
                'google_location' => $request->google_location ?? null,
                'facebook_link' => $request->facebook_link ?? null,
                'youtube_link' => $request->youtube_link ?? null,
                'linkedin_link' => $request->linkedin_link ?? null,
                'instagram_link' => $request->instagram_link ?? null,
                'twitter_link' => $request->twitter_link ?? null,
                'skype_link' => $request->skype_link ?? null,
                'description' => $request->description ?? null,
                'logo' => $image['data'] ?? null,
                'favicon' => $favicon['data'] ?? null,
            ];

            if(!$request->file('image')){
                unset($data['logo']);
            }

            if(!$request->file('favicon')){
                unset($data['favicon']);
            }

            $setting = Setting::update($id, $data);

            if($setting['data']['status'] === 'error'){
                $error = $setting['data']['data'];
                $setting = Setting::first($id);
                $data = $request->all();
                return view('admin.setting.edit',compact('setting','error','data'));
            }

            return redirect()->route('admin.settings.index')
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
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $setting = Setting::delete($id);

            if($setting['status'] === 'error'){
                return back()->with('success', $setting['data']);
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
