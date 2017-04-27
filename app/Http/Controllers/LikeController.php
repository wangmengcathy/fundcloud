<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Like;
use App\Project;
use Input;
use Auth;
use DB;

class LikeController extends Controller
{

    public function like(){
    	$user_id = Auth::user()->id;
    	$project_id = Input::get('project_id');
    	$like = Like::where('user_id', '=', $user_id )->where('project_id', '=', $project_id )->first();
		if ($like === null) {
   			Like::create([
	    		'user_id' => $user_id,
	        	'project_id' => $project_id,
	        	'created_at' => Carbon::now(),
	        	'updated_at'=> Carbon::now()
    		]);
		}
        return back();
    }

    public function unlike(){
    	$user_id = Auth::user()->id;
    	$project_id = Input::get('project_id');
    	$like = Like::where('user_id', '=', $user_id )->where('project_id', '=', $project_id )->first();
		if ($like != null) {
   			Like::where('user_id', '=', $user_id)->where('project_id', '=', $project_id)->delete();
		}
    	return back();
    }


}
