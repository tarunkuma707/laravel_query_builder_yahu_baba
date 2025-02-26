<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];
    public function partner(){
        return $this->belongsTo(Partner::class);
    }
}
