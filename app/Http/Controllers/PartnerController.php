<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Contact;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $partners   =   Partner::where('gender','Female')
        ->withWhereHas('contact',function($query){
            $query->where('city','Delhi');
        })->get();
        return $partners;
        //echo $partners->name."<br/>".$partners->contact->email;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $partner    =    Partner::create([
            'name'=>"Johna",
            'age'=>"15",
            "gender"=>"Male"
        ]);
        $partner->contact()->create([
            'email'=>'john#gmail.com',
            'phone'=>'8768',
            'address'=>'Chandgar',
            'city'=>"Delhi"
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
