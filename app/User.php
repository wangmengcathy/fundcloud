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
    public function posts(){
        return $this->hasMany('App\Project');
    }
    public function projects(){
        return $this->belongsToMany('App\Project')
                ->withPivot('amount','transaction_status')
                ->withTimestamps();
    }
    public function followers(){
        return $this -> belongsToMany('App\Follower');
    }
    public function commments(){
        return $this -> belongsToMany('App\Comment');
    }
}
