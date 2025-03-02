<?php

namespace App\Http\Controllers;

use App\Models\Purchaser;
use Illuminate\Http\Request;
use App\Models\Image;

class PurchaserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $purchase = Purchaser::with("image")->get();
        return $purchase;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $purchase = Purchaser::find(3);
        //return $purchase;
        $purchase->image()->create([
            "url"=>'deepika.jpg'
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
