<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function notes()
    {
        return $this->hasMany('App\Note');
    }


    public function getNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
