<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Note extends Model
{
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
        $this->attributes['slug'] = str_slug($value);
        $this->user_id = Auth::user()->id;
    }
}
