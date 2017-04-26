<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Follower;
use App\Project;
use Input;
use Auth;
use DB;

class OthersController extends Controller
{
    public function follow(){

        // get the id of the user to be followed 
        $following_id = Input::get('id');
        // get the id of the currently logged in user
        $follower_id = Auth::user()->id;
        // define a relationship
        Follower::create([
            'user_id' => $follower_id,
            'following_id' => $following_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        return back();
    }
    public function unfollow(){

        $following_id = Input::get('id');
        $follower_id = Auth::user()->id;
        DB::table('followers')->where('user_id', '=', $follower_id)->where('following_id', '=', $following_id)->delete();
        return back();
    }
    public function others(Project $project){
        $creater = User::findOrFail($project->user_id);
        
        // we get the user's id that matches the username
        $creater_id = $creater->id;
        // declare some default values for variables
        $followers = 0;
        
        if (Auth::user()){
            // if the user tries to go to his/her own profile, redirect to user's profile action.
            if ($creater_id == Auth::user()->id){
                return Redirect::to_action('#');
            } 
             //checkt if the current user is already following $username
            $following = DB::table('followers')->where('user_id', '=', Auth::user()->id)
                            ->Where('following_id','=',$creater_id)->get();
        }
        //the current user doesn't follow the creater
        if($following == '[]'){
            $following = false;
        }
        //the current user follows the creater
        else{
            $following = true;
        }

        $allprojects = Project::with('user') -> where('user_id', '=', $creater_id);
        
        $projects = $allprojects -> orderBy('pid','desc') -> paginate(10);
        
        $projects_count = $allprojects -> count();
        
        $followers = Follower::where('following_id','=',$creater_id)->count();
        
        return view('projects.others',compact('creater','following','projects','projects_count','followers'));
    }
}
