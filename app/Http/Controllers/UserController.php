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
        $pledgeprojects = DB::table('project_user')->where('project_user.user_id','=',$user->id)->join('projects','project_pid','=','projects.pid')->leftjoin('published_projects', 'projects.pid','=','published_projects.pid')->get();

        $avg_ratings = DB::table('projects')->where('projects.user_id','=',$user->id)->leftjoin('rates','projects.pid','=','rates.project_pid')->select('rates.project_pid',DB::raw('avg(rating) as average_rates'))->groupBy('project_pid')->get();
        $createdprojects = DB::table('projects')->where('projects.user_id','=',$user->id)->get();

        return view('projects.profile',compact('user','userprofile','pledgeprojects','createdprojects','ratedprojects','avg_ratings', '$published_pro'));
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

    public function likefeeds(){
        $user = Auth::user();

        $likefeeds = DB::table('likes')
                        ->join('projects','projects.pid','=','likes.project_id')
                        ->where('likes.user_id','=',$user->id)
                        ->get();
         return view('users.likefeeds',compact('likefeeds'));
    }

    public function pledgefeeds(){
        $user = Auth::user();

        $pledgefeeds = DB::table('project_user')
                        ->join('projects','projects.pid','=','project_user.project_pid')
                        ->where('project_user.user_id','=',$user->id)
                        ->select('projects.pid','project_user.user_id','projects.pname','projects.desp', 'projects.projectcover')
                        ->distinct()
                        ->get();
         return view('users.pledgefeeds',compact('pledgefeeds'));
    }
    public function myprojects(){
        $user = Auth::user();

        $myprojects = DB::table('projects')
                        ->where('projects.user_id','=',$user->id)
                        ->get();
         return view('users.myprojects',compact('myprojects'));
    }
    

}
