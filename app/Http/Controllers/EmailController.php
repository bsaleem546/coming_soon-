<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function emailSent(Request $request)
    {
//        dd($request);
        try {
            Mail::to($request->email)->send(new sendMail($request, 0));
            Mail::to('contact@katin.life')->send(new sendMail($request, 1));
            return redirect()->back()->with('success', 'You have successfully subscribed for our early bird discount');
        }
        catch (\Exception $e){
            return redirect()->back()->with('error', 'Some error occured please try again');
        }

    }
}
