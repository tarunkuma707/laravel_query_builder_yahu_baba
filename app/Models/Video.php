<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $guarded=[];
    public function comments(){
        return $this->morphMany(Comment::class,"commentable");
    }

    public function lastestComments(){
        return $this->morphOne(Comment::class,'commentable')->latestOfMany();
    }

    public function OldestComments(){
        return $this->morphOne(Comment::class,'commentable')->oldestOfMany();
    }

    public function mostLikes(){
        return $this->morphOne(Comment::class,'commentable')->ofMany('likes',"max");
    }

    public function leastLikes(){
        return $this->morphOne(Comment::class,'commentable')->ofMany('likes',"min");
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
