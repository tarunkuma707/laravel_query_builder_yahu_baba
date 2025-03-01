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
}
