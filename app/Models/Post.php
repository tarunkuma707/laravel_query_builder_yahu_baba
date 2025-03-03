<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
class Post extends Model
{
    //
    use HasFactory;
    protected $guarded  =   [];
    // public function author(){
    //     return $this->belongsTo(Author::class);
    // }

    public function reader(){
        return $this->belongsTo(Reader::class);
    }
}
