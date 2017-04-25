<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
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
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function addComment($body){
        Comment::create([
            'body' => $body,
            'project_pid' => $this->pid,
            'user_id' => Auth::user()->id,
          ]);
    }
    public function getTagListAttribute(){
        return $this->tags()->pluck('id')->all();
    }
}
