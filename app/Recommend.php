<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $fillable = ['user_id', 'note_id', 'recomedation'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public function note()
    {
    	return $this->belongsTo('App\Note');
    }
}
