<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:8|confirmed'
        ]);
        $user = User::create($data);
        if($user){
            return redirect()->route('login');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect('/login')->with('status', 'Username or Password is wrong..');
        }
    }

    public function innerPage(){
        if(Auth::check()){
            return view('inner');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function dashboardPage(){
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');

    }
}
