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
        $userid = Auth::user()->id;
    	if($request->file('posting1') != null){
            $number = DB::table('projects')
                        ->where('projects.pid', '=', $project_pid)
                        ->count();
            $number = $number + 1;
            $fileName = 'project'.$project_pid . 'image'.'number' . $number .'.'.
                $request->file('posting1')->getClientOriginalExtension();
            $request->file('posting1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectpostings', $fileName
            );
            $request['material'] = $fileName;          
         }
         if($request->file('audio1') != null){
            $number = DB::table('projects')
                        ->where('projects.pid', '=', $project_pid)
                        ->count();
            $number = $number + 1;
            $fileName = 'project'.$project_pid .'audio' .'number' . $number .'.'.
                $request->file('audio1')->getClientOriginalExtension();
            $request->file('audio1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectpostings', $fileName
            );
            $request['audio'] = $fileName;          
         }
         if($request->file('video1') != null){
            $number = DB::table('projects')
                        ->where('projects.pid', '=', $project_pid)
                        ->count();
            $number = $number + 1;
            $fileName = 'project'.$project_pid . 'video'.'number' . $number .'.'.
                $request->file('video1')->getClientOriginalExtension();
            $request->file('video1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectpostings', $fileName
            );
            $request['video'] = $fileName;          
         }

    	DB::table('postings')->insert([
    		'project_pid' => $project_pid, 'material'=> $request['material'], 'audio' => $request['audio'],'video' => $request['video'],'posting_desp' => $request['posting_desp'],

    		'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    	return redirect()->action('ProjectController@show', ['id' => $project_pid]);
    }
}
