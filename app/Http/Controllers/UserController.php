<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\UserProfile;

class UserController extends Controller
{
    public function profile(){
        
        $user = Auth::user();
        
        $userprofile = UserProfile::findOrFail($user->id);
        
        $pledgeprojects = DB::table('project_user')->where('project_user.user_id','=',$user->id)->join('projects','project_pid','=','projects.pid')->get();

        $createdprojects = DB::table('projects')->where('user_id','=',$user->id)->get();

        return view('projects.profile',compact('user','userprofile','pledgeprojects','createdprojects'));
    }
    
    public function storeprofile(){
        return;
    }
}
