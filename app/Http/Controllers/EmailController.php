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

    public function contactForm(){
        return view('contact-form');
    }

    public function sendContactEmail(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required|min:5|max:100',
            'message'=>'required|min:5|max:100',
            'attachment'=>'required|max:2048|mimes:pdf,docx,doc,xlsx,xls',
        ]);
        $fileName = time().".".$request->file('attachment')->extension();
        $request->file('attachment')->move('uploads',$fileName);
        $adminEmail ='tarunkuma07@gmail.com';

        $response = Mail::to($adminEmail)->send(new welcomeemail($request->all(), $fileName));
        if($response){
            return back()->with('success',"Thanks for contacting us.");
        }
        else{
            return back()->with('error',"Unable to submit form, Please try again!!");
        }
        dd($fileName);
    }
}
