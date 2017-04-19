<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    protected $primaryKey = 'pid';
    protected $fillable = [
        'pname',
        'desp',
        'minmoney',
        'maxmoney',
        'endtime',
        'release_time',
        'tag',
        'raisedmoney',
    ];
    protected $dates = ['endtime'];
    public $timestamps = false;
    public function scopeValidProject($query){
        $query->where('endtime','>',Carbon::now());
    }
    
    /**
    *A project is owned by a user
    **/
    public function creater(){
        return $this->belongsTo('App\User');
    }
}
