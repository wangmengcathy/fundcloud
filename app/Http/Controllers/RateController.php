<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRateRequest;
use App\Project;
use Carbon\Carbon;
use Auth;
use DB;

class RateController extends Controller
{
    public function index(Project $project){
        
        $user = Auth::user();
        $samples = DB::table('sample')->where('pid','=',$project->pid)->get();

        return view('projects.rate',compact('project','user','samples'));
    }
    
    public function store(CreateRateRequest $request){
 
        DB::table('rates')->insert(['user_id'=>$request['user_id'],'project_pid'=>$request['project_pid'],'rating'=>$request['rating'],'rate_content'=>$request['rate_content'], 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        return redirect()->action('ProjectController@show', ['id' => $request['project_pid']]);
    }
}
