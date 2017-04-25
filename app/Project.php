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
    public function sponsers(){
        return $this->belongsToMany('App\User')
                    ->withPivot('amount','transaction_status')
                    ->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    public function getTagListAttribute(){
        return $this->tags()->pluck('id')->all();
    }
}
