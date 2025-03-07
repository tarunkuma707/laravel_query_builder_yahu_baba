<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function loginPage(){
        if(Auth::id()){
            return redirect()->route('dashboard');
        }
        else{
            return view('login');
        }
    }
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
        return view('inner');
    }

    public function dashboardPage(){
        // if(Gate::allows('isAdmin')){
        //     return view('dashboard');
        // }
        // else{
        //     return view('login');
        // }
        //Gate::authorize('isAdmin');
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
        //return view('dashboard');
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }

    public function viewProfile(int $userid){
        Gate::authorize('view-profile',$userid);
        $user = User::findorfail($userid);
        //return $user;
        return view('profile',compact('user'));
        // if(Gate::allows('view-profile',$userid)){
        //     $user = User::findorfail($userid);
        // //return $user;
        //     return view('profile',compact('user'));
        // }
        // else{
        //     if(Auth::Guest()){
        //         abort(403);
        //     }
        //     else{
        //         return redirect()->route('dashboard');
        //     }
        // }
    }

    public function viewBlog(){
        $posts = Post::where('user_id',Auth::user()->id)->get();   
        return view('posts',compact('posts'));
    }

    public function updateBlog($postId){
        $post = Post::find($postId);
        if(empty($post)){
            return redirect()->route('dashboard');
        }
        $targetUser = $post->user_id;
        Gate::authorize('udpate-post',$targetUser);
        return $post;
    }
}
