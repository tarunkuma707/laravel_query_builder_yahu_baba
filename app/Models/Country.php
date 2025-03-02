<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    //
    use HasFactory;
    public function posts(){
        return $this->hasManyThrough(Post::class,Reader::class);
    }

    public function readers(){
        return $this->hasMany(Reader::class);
    }
}
