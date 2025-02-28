<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    use HasFactory;
    protected $guarded  =   [];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
