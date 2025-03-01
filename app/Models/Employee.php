<?php

namespace App\Models;

use App\Models\Role;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function roles(){
        return $this->belongsToMany(Role::class,'employee_role');
    }

    public function phoneNumber(){
        return $this->hasOneThrough(Phone_number::class,Company::class)->withDefault();
    }

    public function company(){
        return $this->hasOne(Company::class)->withDefault();
    }
}
