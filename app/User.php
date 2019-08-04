<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id', 'about', 'avatar', 'proffesion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function notes()
    {
        return $this->hasMany('App\Note');
    }


    public function orders()
    {
        return $this->hasMany('App\Order');
    }


    public function reviews()
    {
        return $this->hasMany('App\Review');
    }


    public function country()
    {
        return $this->belongsTo('App\Country');
    }


    public function stars()
    {
        return $this->hasMany('App\Star');
    }


    
}
