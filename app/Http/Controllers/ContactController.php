<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Partner;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function show(){
        $contacts   =   Contact::with('partner')->get();
        return $contacts;
    }
}
