<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishedProject extends Model
{
    protected $fillable = [
        'pid',
        'created_at',
        'updated_at',
        'materials',
        'fundmoney',
        'status',
        ];
}
