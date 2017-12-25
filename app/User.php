<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function day() {
        return $this->hasMany('App\Day');
    }

    public function image() {
        return $this->hasMany('App\Image');
    }

    public function task() {
        return $this->hasMany('App\Task');
    }

    public function calendar() {
        return $this->hasMany('App\Calendar');
    }

    public function user() {
        return $this->hasMany('App\RequestModel', 'user_id', 'id');
    }

    public function friend() {
        return $this->hasMany('App\RequestModel', 'friend_id', 'id');
    }

}
