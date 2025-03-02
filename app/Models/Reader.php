<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Reader extends Model
{
    //
    use HasFactory;
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    // protected static function booted() :void
    // {
    //     static::deleted(function($reader){
    //         $reader->posts()->delete();
    //     });
        
    //     static::created(function($reader){
            
    //     });

    //     static::updated(function($reader){
            
    //     });
    // }
}
