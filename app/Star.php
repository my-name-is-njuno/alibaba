<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
	protected $fillable = ['user_id', 'note_id', 'stars'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public function note()
    {
    	return $this->belongsTo('App\Note');
    }
}
