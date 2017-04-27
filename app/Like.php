<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'created_at',
        'updated_at',
        ];

    public function users(){
        return $this->belongsTo('User');
    }

    public function projects(){
        return $this->belongsTo('Project');
    }
}
