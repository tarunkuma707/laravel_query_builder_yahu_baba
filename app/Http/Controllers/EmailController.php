<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function sendEmail(){
        $toEmail    =   "tarkumar07@gmail.com";
        $ccEmail    =   "rinku.kkumar07@gmail.com";
        $message    =   "Hello, Welcome to Website";
        $subject    =   "Welcome to here";
        $details = [
            'name'=>"John Doe",
            'product'=>'Test Product',
            'price'=>250
        ];
        $request = Mail::to($toEmail)->cc($ccEmail)->send(new welcomeemail($message, $subject, $details));
        dd($request);
    }
}
