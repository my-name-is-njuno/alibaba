<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Star;

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


    public function stars()
    {
        return $this->hasMany('App\Star');
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



    public function getStars()
    {
        $strs = 0;

        $stars_total = Star::where('note_id', $this->id)->sum('stars') ;
        $stars_count = $this->stars->count();
        if($stars_count == 0) {
            $strs = 0;
        }
        if($stars_total > 0) {
            $strs = round($stars_total / $stars_count);
        }

        return $strs;
    }
}
