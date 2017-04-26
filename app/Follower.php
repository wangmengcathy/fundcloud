<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id',
        'following_id',
        'created_at',
        'updated_at',
        ];
    public function users(){
        return $this -> belongsToMany('User');
    }
    
    public function posts(){
        return $this->hasMany('App\Project');
    }
}
