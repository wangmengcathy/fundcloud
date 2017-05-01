<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $fillable = [
        'project_pid',
        'posting_desp',
        'material',
        'audio',
        'video',
        'created_at',
        'updated_at',
    ];

    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
