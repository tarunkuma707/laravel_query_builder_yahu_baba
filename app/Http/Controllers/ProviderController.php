<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $providers = Provider::simplepaginate(10);
        return view('providerhome',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("addprovider");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username'=>'required',
            'useremail'=>'required|email',
            'usersalary'=>'required|numeric',
            'userdob'=>'required',
            'userpass'=>'required',
        ]);
        $provider = Provider::create([
            'user_name'=>$request->username,
            'email'=>$request->useremail,
            'salary'=>$request->usersalary,
            'dob'=>$request->userdob,
            'password'=>$request->userpass,
        ]);
        return redirect()->route('provider.index')->with('status','Provider Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $providers  =   Provider::find($id);
        return view('viewprovider',compact($providers));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $providers  =   Provider::find($id);
        return view('updateprovider',compact($providers));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'username'=>'required',
            'useremail'=>'required|email',
            'usersalary'=>'required|numeric',
            'userdob'=>'required',
            'userpass'=>'required',
        ]);
        $provider   =   Provider::where('id',$id)
                        ->update([
                            'user_name'=>$request->username,
                            'email'=>$request->useremail,
                            'salary'=>$request->usersalary,
                            'dob'=>$request->userdob,
                            'password'=>$request->userpass,
                    ]);
        return redirect()->route('provider.index')->with('status','Provider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $provider = Provider::find($id);
        $provider->delete();
        return redirect()->route('provider.index')->with('status','Provider Deleted Successfully');
    }
}
