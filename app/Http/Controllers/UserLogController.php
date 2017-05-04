<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use App\UserLog;

class UserLogController extends Controller
{
    public function browseHistory(){
    	$user_id = Auth::user()->id;
    }

    public function recommend(){
    	$user_id = Auth::user()->id;
    	$userLog = DB::table('user_logs')
                            ->join('projects', 'user_logs.project_pid', '=', 'projects.pid')
                            ->where('user_logs.user_id','=',$user_id)
    						->orderBy('count','DESC')
                            ->limit(20)
    						->get();
    	return $userLog;
    }
    public function store($project_id, $count){
    	$user_id = Auth::user()->id;
    	$log = DB::table('user_logs')
	    		->where('user_id','=',$user_id)
		        ->where('project_pid', '=', $project_id)
		        ->get();
    	if($log != '[]'){
    		DB::table('user_logs')
        		->where('user_id','=',$user_id)
                ->where('project_pid', '=', $project_id)
                ->increment('count', $count);
            $change = DB::table('user_logs')
                        ->where('user_id','=',$user_id)
                        ->where('project_pid', '=', $project_id)
                        ->first();
            if($change->count == 0){
                DB::table('user_logs')
                        ->where('user_id','=',$user_id)
                        ->where('project_pid', '=', $project_id)
                        ->delete();
            }
    	}else{
    		UserLog::create([
            'user_id' => $user_id,
            'project_pid' => $project_id,
            'count' => $count,
            'created_at' => Carbon::now(),
            'replied_name' => Carbon::now(),
          ]);
    	}
    	
    }
}
