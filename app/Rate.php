<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rating', 'rate_content','created_at', 'updated_at',
        ];
}
