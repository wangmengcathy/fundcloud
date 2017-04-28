<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserProfileRequest;
use Auth;
use DB;
use App\UserProfile;

class UserController extends Controller
{
    public function profile(){
        
        $user = Auth::user();
        
        $userprofile = UserProfile::find($user->id);
        
        //edit the profile
        if($userprofile == null){
            return view('projects.createprofile',compact('user'));
        }
        //show the profile
        $pledgeprojects = DB::table('project_user')->where('project_user.user_id','=',$user->id)->join('projects','project_pid','=','projects.pid')->get();

        $createdprojects = DB::table('projects')->where('user_id','=',$user->id)->get();

        $ratedprojects = DB::table('rates')->get();
        return view('projects.profile',compact('user','userprofile','pledgeprojects','createdprojects','ratedprojects'));
    }
    
    public function storeprofile(CreateUserProfileRequest $request){

        $id = Auth::user()->id;
        
        DB::table('user_profiles')->insert(['id' => $id, 'hometown' => $request['hometown'],
        'birthday' => $request['birthday'], 'interest' => $request['interest'], 
        'creditcard' => $request['creditcard'], 'legalname' => $request['legalname']
        ]);
        
        return redirect('/profile');
    }
    

}
