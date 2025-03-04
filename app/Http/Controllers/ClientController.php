<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::get();

        return view('file-upload',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "photo"=>'required|mimes:png,jpg,jpeg|max:3000'
        ]);
        $file = $request->file('photo');
        $file->move(public_path('uploads'),$file->getClientOriginalPath());
        //$path = $request->photo->store('image','public');
        $client = Client::create([
            'file_name'=>$file->getClientOriginalPath()
        ]);
        return redirect()->route('client.index')->with('status','Image Uploaded Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $client = Client::find($id);
        return view('file-update',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $client = Client::find($id);
        if($request->hasFile('photo')){
            $image_path = public_path("storge/").$client->file_name;
            if(file_exists($image_path)){
                @unlink($image_path);
            }
            $path = $request->photo->store('image','public');
            $client->file_name = $path;
            $client->save();
            return redirect()->route('client.index')->with('status','Image Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $client = Client::find($id);
        $client->delete();
        $image_path = public_path("storge/").$client->file_name;
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return redirect()->route('client.index')->with('status','Image Deleted Successfully.');
    }
}
