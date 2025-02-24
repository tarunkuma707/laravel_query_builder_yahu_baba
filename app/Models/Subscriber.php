<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    use HasFactory;
    //protected $guarded =[];
    protected $fillable =   ['name','email','age','city'];
}
