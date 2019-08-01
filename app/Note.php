<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }
}
