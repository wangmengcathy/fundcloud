<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Follower;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $follower_id = Auth::user()->id;
        $follow_contents = DB::table('followers')->join('projects', 'followers.following_id','=','projects.user_id')->where('followers.user_id', '=', $follower_id)->get();
        $popular_projects_array = DB::table('projects')->join('project_user','projects.pid', '=', 'project_user.project_pid')->orderBy('updated_at', 'DESC')->get();
        $dic = [];
        $unique = [];
        foreach($popular_projects_array as $popular_project){
            if(!in_array($popular_project->pid, $dic)){
                array_push($unique, $popular_project);
                array_push($dic, $popular_project->pid);
            }
        }
        $popular_projects = $unique;
        //user log recommend
        $recommends = app('App\Http\Controllers\UserLogController')->recommend();

        return view('home', compact('follow_contents', 'popular_projects', 'recommends'));
    }

    public function search($search_content){

        $search_result = Project::where('pname', $search_content) 
                            ->join('project_tag', 'project_tag.project_pid','=','projects.pid')  ->join('tags','tags.id','=','project_tag.tag_id')
                            ->orWhere('pname', 'like', '%' . $search_content . '%')
                            ->orWhere('desp', 'like', '%' . $search_content . '%')
                            ->orWhere('tags.name','like','%' . $search_content . '%')
                            ->limit(10)
                            ->get();
        foreach($search_result as $result){
            app('App\Http\Controllers\UserLogController')->store($result->pid,2);
        }
        return view('search/index', compact('search_result'));

    }

    public function follows()
    {
        $follower_id = Auth::user()->id;
        $follow_contents = DB::table('followers')->join('projects', 'followers.following_id','=','projects.user_id')->where('followers.user_id', '=', $follower_id)->get();
        return view('home_seeall/followfeeds', compact('follow_contents'));
    }

    public function recommend()
    {
        $recommends = app('App\Http\Controllers\UserLogController')->recommend();
        return view('home_seeall/recommends', compact('recommends'));
    }

    public function popular()
    {
        $popular_projects_array = DB::table('projects')->join('project_user','projects.pid', '=', 'project_user.project_pid')->orderBy('project_user.updated_at', 'DESC')->get();
        $dic = [];
        $unique = [];
        foreach($popular_projects_array as $popular_project){
            if(!in_array($popular_project->pid, $dic)){
                array_push($unique, $popular_project);
                array_push($dic, $popular_project->pid);
            }
        }
        $popular_projects = $unique;
        return view('home_seeall/popular', compact('popular_projects'));
    }
}
