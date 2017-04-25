<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
