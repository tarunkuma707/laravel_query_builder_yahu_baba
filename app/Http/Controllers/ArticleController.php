<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $article = Article::with('image')->find(1);
        // return $article;
        $articles = Article::with('tags')->get();
        //return $articles;
        foreach($articles as $singlearticle){
            echo "<h2>$singlearticle->title</h2>";
            echo "<p>$singlearticle->description</p>";
            foreach($singlearticle->tags as $tag){
                echo "Tags: $tag->tag_name /";
            }
        }
    }

    public function createnew(){
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $article = Article::create([
        //     'title'=>'News Title 1',
        //     'description'=>'Lorem Ipsum is dummy text',
        // ]);
        // $article->image()->create([
        //     'url'=>'post-1.jpg'
        // ]);
        // $article = Article::create([
        //     'title'=>'New Title Article',
        //     'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ut!"
        // ]);
        // $article->comments()->create([
        //     "detail"=>'this is post comment',
        // ]);
        //////////// Morph to may lecture 45 ///
        // $article = Article::create([
        //     'title'=>'News title two',
        //     'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, maxime."
        // ]);

        $article = Article::find(3);

        $article->tags()->attach([2,6]);
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
