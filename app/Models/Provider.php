<?php

namespace App\Models;

use Attribute;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    //
    use HasFactory;
    protected $guarded =[];
    public function setEmailAttribute($value){
        $this->attributes['email']  =   strtolower($value);
    }

    // public function setUserNameAttribute($value){
    //     $this->attributes['user_name']  =   strtolower($value);
    // }

    public function getDobAttribute($value){
        return date('d M Y',strtotime($value));
    }

    // public function getUserNameAttribute($value){
    //     return ucwords($value);
    // }

    public function getSalaryAttribute($value){
        return Number::spell($value);
    }

    protected function UserName(): Attribute{
        return Attribute::make(
            get: fn(string $value)  =>  ucwords($value),
            set: fn(string $value)  =>  strtolower($value),
        );
    }
}
