<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function note()
    {
        return $this->belongsTo('App\Note');
    }



    public function setReviewAttribute($value)
    {
        $this->attributes['review'] = ucfirst(strtolower($value));
        $this->user_id = Auth::user()->id;
    }
}
