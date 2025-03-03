<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use App\Models\Reader;
use App\Models\Scopes\ReaderScope;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $reader    =   Reader::withoutGlobalScope(ReaderScope::class)->with('posts')->with('country')->get();
        // return $readers;
        
        //$reader =   Reader::with("posts")->find(2);
        // $reader  = Reader::city(["Delhi"])
        //             //->where('status',1)
        //             //->active()
        //             // ->city(["Chandigarh","Delhi"])
        //             // ->sort("DESC")
        //             ->get();
        return $reader;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $reader =   Reader::find(3)->delete();
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
