<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Newsletter;
use Illuminate\Http\Request;


class NewsletterController extends Controller
{


    public function store(Request $request)
    {
        try {

            $data = [
                'email' => $request->email,
            ];

            $newsletter = Newsletter::save($data);
            if($newsletter['status'] === 'error'){
                $error = $newsletter['data']['email'][0];

                return back()->with('error',$error);
            }

            return redirect()->back()
                ->with('success','Subscribe successfully');

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }
}
