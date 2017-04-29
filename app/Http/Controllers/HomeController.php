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
        $popular_projects = DB::table('projects')->join('project_user','projects.pid', '=', 'project_user.project_pid')->orderBy('updated_at', 'DESC')->get();
        return view('home', compact('follow_contents', 'popular_projects'));
    }

    public function search($search_content){

        $search_result = Project::where('pname', $search_content)
    ->orWhere('pname', 'like', '%' . $search_content . '%')->orWhere('desp', 'like', '%' . $search_content . '%')->limit(10)->get();

        return view('search/index', compact('search_result'));

    }
}
