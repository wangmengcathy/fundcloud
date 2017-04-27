<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'project_pid',
        'user_id',
        ];
    public function projects(){
        return $this->belongsTo(Project::class);
    }

    public function users(){
    	return $this->belongsToMany('User');
    }
}
