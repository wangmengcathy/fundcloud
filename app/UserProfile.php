<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'hometown', 'interest', 'creditcard','legalname',
        ];
    public $timestamps = false;
}
