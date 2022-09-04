<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Contact;
use App\Repositories\Setting;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $setting = Setting::isActive(['is_active'=>1]);

            if($setting['status'] == 'success'){
                $setting = $setting['data'];
            }
            return view('contact',compact('setting'));
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    public function store(Request $request)
    {

        try {

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            $contact = Contact::save($data);

            if($contact['status'] === 'error'){
                $error = $contact['data'];
                $contact = null;
                $setting = Setting::isActive(['is_active'=>1]);
                if($setting['status'] == 'success'){
                    $setting = $setting['data'];
                }
                $data = $request->all();
                return view('contact',compact('contact','error','data','setting'));
            }

            return redirect()->back()
                ->with('success','Added successfully');

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
