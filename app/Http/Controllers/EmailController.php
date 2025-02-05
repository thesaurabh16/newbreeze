<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail="saurabh98615@gmail.com";
        $moreUser="19cse366.saurabhshah@giet.edu";
        $message = "Thankyou for creating your account with us. i hope you enjoy your time!";
        $subject ="welcome to my website";
        // $details = [
        //     'name'=>'cloudtech',
        //     'product'=>'testing the email',
        //     'price'=> 'paid through wallet',
        // ];

        $request = Mail::to($toEmail)->cc($moreUser)->send(new welcomeemail($message,$subject));

        dd($request);
    }


}
