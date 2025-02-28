<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$authors= Author::with('post')->find(5);
        // $authors = Author::find(2);
        // $posts  =   $authors->post;
        //$authors    =   Author::has("post",">=",3)->with("post")->get();
        $authors    =   Author::select(['name','email'])->withCount("post")->get();
        return $authors;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $post  = new Post([
        //     'title'=>"News Title",
        //     'description'=>'Testing'
        // ]);
        // $author   = Author::find(2);
        // $author->post()->save($post);
        $author   = Author::find(2);
        $author->post()->createMany(
        [
            [
                'title'=>"News Title - New",
                'description'=>'Testing New'
            ],
            [
                'title'=>"News Title - New Once More",
                'description'=>'Testing New Once More'
            ]
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
