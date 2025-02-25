<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$subscribers    =   Subscriber::all();
        $subscribers    =   Subscriber::simplepaginate(4);
        // // $subscribers    =   Subscriber::where('city',"=","Delhi")
        // //                     ->where("age",">","20")                    
        // //                     ->get();
        // $subscribers    =   Subscriber::where("city","<>","Delhi")
        // ->get();
        //return $subscribers; 
        return view('subscriberhome',compact("subscribers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('addsubscriber');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        // $subscriber =   new Subscriber();
        // $subscriber->name   =$request->username;
        // $subscriber->email   =$request->useremail;
        // $subscriber->age   =$request->userage;
        // $subscriber->city   =$request->usercity;
        // $subscriber->save();
        Subscriber::create([
            'name'=>$request->username,
            'email'=>$request->useremail,
            'age'=>$request->userage,
            'city'=>$request->usercity,
        ]);
        return redirect()->route('subscribers.index')->with('status',"Subscriber has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
       
        $subscribershow =   Subscriber::find($subscriber);
        return view('viewsubscriber', compact('subscribershow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
        $subscribers    =   Subscriber::find($subscriber->id);
        return view('updatesubscriber',['subscribers'=>$subscribers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $subscribers = Subscriber::find($id);
        // $subscribers->name   =$request->username;
        // $subscribers->email   =$request->useremail;
        // $subscribers->age   =$request->userage;
        // $subscribers->city   =$request->usercity;
        // $subscribers->save();
        $request->validate([
            'username'=>'required|min:3',
            'useremail'=>'required|email|unique:subscribers,email',
            'userage'=>'required|numeric',
            'usercity'=>'required|alpha'
        ]);
        $subscribers    =   Subscriber::where(['id'=>$id])
                            ->update([
                                'name'=>$request->username,
                                'email'=>$request->useremail,
                                'age'=>$request->userage,
                                'city'=>$request->usercity,
                            ]);
        return redirect()->route('subscribers.index')->with('status',"Subscriber has been Updated");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //$subscribers    =   Subscriber::find($id)->delete();
        Subscriber::destroy($id);

        return redirect()->route('subscribers.index')->with('status',"Subscriber has been Deleted Successfully.");
    }
}
