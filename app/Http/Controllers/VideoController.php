<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos = Video::with("comments")->get();
        foreach($videos as $video){
            echo "<h1>$video->title</h1>";
            echo "<h4>$video->url</h4>";
            echo "<h6>$video->title</h6>";
            foreach($video->comments as $comment){
                echo $comment->detail."<br/>";
            }
        }
        //return $videos;
        //$videos = Video::find(1);
        // echo "<h1>$videos->title</h1>";
        // echo "<h4>$videos->url</h4>";
        // echo "<h6>$videos->title</h6>";
        
        // foreach($videos->comments as $comment){
        //     echo $comment->detail."<br/>";
        // }
        //echo "<hr>";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $videos = Video::find(2)->comments()->create([
            'detail'=>'Awsome Video!',
            'commentable_id'=>"2"
        ]);
        // $videos->comments()->create([
        //     'detail'=>'Awsome Video!'
        // ]);
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
