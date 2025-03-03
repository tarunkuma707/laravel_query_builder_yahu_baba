<?php

namespace App\Models;

use App\Models\Scopes\ReaderScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

#[ScopedBy([ReaderScope::class])]
class Reader extends Model
{
    //
    use HasFactory;

    // protected static function booted(): void{
    //     // static::addGlobalScope('userdetail', function(Builder $builder){
    //     //     $builder->where('status',1);
    //     // });
    //     static::addGlobalScope(new ReaderScope);
    // }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    
    public function scopeActive($query){
        $query->where('status',1);
    }

    public function scopeCity($query,$cityName){
        $query->where('city',$cityName);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function scopeSort($query,$sortType){
        $query->orderBy('name',$sortType);
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
