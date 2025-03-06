<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function index(){
        // $value  =   session()->all();
        // echo '<pre>';
        // print_r($value);
        // echo '</pre>';

        $value = session('name');
        return view('sessionhome',compact('value'));
        // if(session()->has('name')){
        //  $value = session()->get('name');
        //  echo $value;
        // }
        // else{
        //     echo "No Name Session";
        // }
        //$value = session()->get('name');
        // $value = session('name',"HELLO");
        // echo $value;

    }

    public function storeSession(Request $request){
        session(
            [
                'name'=>'Yahubaba',
                'class'=>"BTech"
            ]
        );
        session()->flash('status','Seesion Save Successfully');
        session()->regenerate();
        return redirect('/session');
    }

    public function deleteSession(){
        //session()->forget(['name','class']);
        session()->flush();
        return redirect('/session');
    }
}
