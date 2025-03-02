<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$test = Test::orderBy('meta_data->name')->get();
        $test = Test::whereJsonLength('meta_data->name',1)->get();
        return $test;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $test = new Test();
        // $test->meta_data = [
        //     'name'=>'Yahoo Baba',
        //     'email'=>'yahoo@gmail.com',
        //     'mobile_number'=>'9876'
        // ];
        // $test->save();
        // $test = Test::create([
        //     'meta_data'=>[
        //         'name'=>'Katria Kaif',
        //         'email'=>'kartik@gmail.com',
        //         'mobile_number'=>'9876',
        //         'address'=>[
        //             'street'=>  '#1111, Valad',
        //             'city'=>'Mumbai',
        //             'country'=>"India"
        //         ]
        //     ]
        // ]);
        // $test = Test::where('id',3)->update([
        //     'meta_data->address->city'   =>'Delhi',
        // ]);
        // $test = Test::find(2);
        // $test->meta_data =  collect($test->meta_data)->forget('email');
        // $test->save();
        $test = Test::where('id',2)->update([
            'meta_data->email'   =>'johanAbhram@gmail.com',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
