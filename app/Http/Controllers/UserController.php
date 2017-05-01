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
        $pledgeprojects = DB::table('project_user')->join('projects','project_user.project_pid','=','projects.pid')->where('project_user.user_id','=',$user->id)->get();

        $avg_ratings = DB::table('projects')->where('projects.user_id','=',$user->id)->leftjoin('rates','projects.pid','=','rates.project_pid')->select('rates.project_pid',DB::raw('avg(rating) as average_rates'))->groupBy('project_pid')->get();
        $createdprojects = DB::table('projects')->where('projects.user_id','=',$user->id)->get();

        return view('projects.profile',compact('user','userprofile','pledgeprojects','createdprojects','ratedprojects','avg_ratings'));
    }
    
    public function storeprofile(CreateUserProfileRequest $request){

        $id = Auth::user()->id;
        
        $imageName = 'user'.$id . '.' . 
            $request->file('profileimage')->getClientOriginalExtension();

        $request->file('profileimage')->move(

            $_SERVER["DOCUMENT_ROOT"].'/public/photo', $imageName
        );
        
        DB::table('user_profiles')->insert(['id' => $id, 'imagename' => $imageName,'hometown' => $request['hometown'],
        'birthday' => $request['birthday'], 'interest' => $request['interest'], 
        'creditcard' => $request['creditcard'], 'legalname' => $request['legalname']
        ]);
        
        return redirect('/profile');
    }
    

}
