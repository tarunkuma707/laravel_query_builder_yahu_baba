<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts  =   Post::withWhereHas('author',function($query){
        //             $query->where("name","S1")
        //             ->orWhere("name","S2");
        //                 })->get();
        // foreach($posts as $post){
        //     echo $post->title."<br/>";
        //     echo $post->description."<br/>";
        //     echo $post->author->name."<br/>";
        // }
        $authors  =   Author::where('name',"S1")->get();
        $posts  =   Post::whereBelongsTo($authors)->get();
        return $posts;
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
