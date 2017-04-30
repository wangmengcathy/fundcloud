<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    //
    protected $fillable = [
    	'user_id',
    	'project_pid',
    	'count',
    	'created_at',
    	'updated_at',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
