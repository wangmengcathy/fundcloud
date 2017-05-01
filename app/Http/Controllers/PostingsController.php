<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostingRequest;
use App\Project;
use Auth;
use Input;
use DB;
use Carbon\Carbon;

class PostingsController extends Controller
{
    public function edit($project_pid)
    {
    	$project = Project::findOrFail($project_pid);
    	return view('projects.posting',compact('project'));
    }

    public function storeposting(CreatePostingRequest $request){
    	$project_pid = $request['project_pid'];
    	if($request->file('posting1') != null){
            $userid = Auth::user()->id;
            $number = DB::table('projects')
                        ->where('projects.pid', '=', $project_pid)
                        ->count();
            $number = $number + 1;
            $fileName = 'project'.$project_pid . 'number' . $number .'.'.
                $request->file('posting1')->getClientOriginalExtension();
            $request->file('posting1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectpostings', $fileName
            );
            $request['material'] = $fileName;          
         }

    	DB::table('postings')->insert([
    		'project_pid' => $project_pid, 'material'=> $request['material'], 'posting_desp' => $request['posting_desp'],
    		'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    	return redirect()->action('ProjectController@show', ['id' => $project_pid]);
    }
}
