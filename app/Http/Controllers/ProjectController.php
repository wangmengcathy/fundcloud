<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\CreatePledgeRequest;
use Storage;
use App\Project;
use Carbon\Carbon;
use App\User;
use App\Tag;
use App\Like;
use Auth;
use Input;
use App\PublishedProject;
use DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //valid projects
        $projects = Project::orderBy('pid', 'DESC')->validproject()->get();

        //expired projects
        $exprojects = Project::orderBy('pid', 'DESC')->expiredproject()->get();
        //expried projects reach the minmoney
        foreach($exprojects as $exproject){
            if($exproject->raisedmoney >= $exproject->minmoney){
                $results = PublishedProject::select('pid')->where('pid','=',$exproject->pid)->get();
                //the expired projects has not been inserted into published_projects
                if($results == '[]'){
                    PublishedProject::insert(
                                             ['pid' => $exproject->pid, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'materials' => 'xxx', 'fundmoney' => $exproject->raisedmoney, 'status' => 'pending']
                                             );
                }
            }
        }
        //check whether reach maxmoney,if yes, insert into published project table
        
        $allprojects = DB::table('projects')->get();
        
        foreach($allprojects as $project){
            
            $result = PublishedProject::select('pid')->where('pid','=',$project->pid)->first();
            if($result == null &&($project->raisedmoney >= $project->maxmoney)){
                PublishedProject::insert(['pid' => $project->pid, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'materials' => 'xxx', 'fundmoney' => $project->raisedmoney, 'status' => 'pending']);
            }
        }
        
        //charge user's pledged money for published projects
        DB::table('project_user')->join('published_projects','project_pid','=','published_projects.pid')->update(['transaction_status' => 'posted']);
        
        return view('projects.index',compact('projects'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('name','id')->all();

        return view('projects.create',compact('tags'));
    }
    
    public function pledge($id){
        
        
        return view('projects.pledge',compact('id'));
        
    }
    public function pledgestore(CreatePledgeRequest $request){
        
        $amount = $request['amount'];
        $project = Input::get('id');
        $sponser = Auth::user()->id;
        $project = Project::findOrFail($project);
        $project->sponsers()->attach($sponser,['amount'=>$amount,'transaction_status'=>'pending']);
        
        //update the raised money for the pledged project
        DB::table('projects')
        ->where('pid', $project->pid)
        ->update(['raisedmoney' => ($project->raisedmoney)+$amount]);
        
        \Session::flash('flash_message', "Thanks for your sponsorship!");
        return redirect('projects');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
       /**
        *create a project
        **/
        $request['raisedmoney'] = 0;
        $request['user_id'] = Auth::user()->id;
        
        
        //store sample1
        if($request->file('projectsample1') != null){
            $fileName = 'user'.Auth::user()->id . 'sample1.' . 
                $request->file('projectsample1')->getClientOriginalExtension();

            $request->file('projectsample1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample1'] = $fileName;
         }
        
        //store sample2
        if($request->file('projectsample2') != null){
            $fileName = 'user'.Auth::user()->id . 'sample2.' . 
                $request->file('projectsample2')->getClientOriginalExtension();

            $request->file('projectsample2')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample2'] = $fileName;
        }
        
        //store sample3
        if($request->file('projectsample3') != null){
            $fileName = 'user'.Auth::user()->id . 'sample3.' . 
                $request->file('projectsample3')->getClientOriginalExtension();

            $request->file('projectsample3')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample3'] = $fileName;
        }
//        return $request->all();
        $project = new Project($request->all());
        
        Auth::user()->posts()->save($project);
        

        $tagIds = $request->input('tag_list');
        

        $project->tags()->attach($tagIds);
        
        DB::table('sample')->insert(['pid'=>$project->pid,'sample1'=>$request['sample1'],'sample2'=>$request['sample2'],'sample3'=>$request['sample3']]);
        
        \Session::flash('flash_message','Your project has been created!');
        
        return redirect('projects');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $creater = User::findOrFail($project->user_id);

        $count = Like::where('project_id', '=', $id)->count();
        $already_like = Like::where('project_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->count();

        $comments_author = DB::table('comments')
                                ->join('users', 'users.id', '=', 'comments.user_id')
                                ->where('comments.project_pid', '=', $id)
                                ->get();
        $pledge_record = DB::table('project_user')
                             ->where('project_pid', '=', $id)
                             ->get();
                           
        $samples = DB::table('sample')->where('pid','=',$id)->get();

        return view('projects.show',
            compact('project','samples','creater','count','already_like','comments_author', 'pledge_record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::pluck('name','id')->all();
        
        $project = Project::findOrFail($id);
        
        $samples = DB::table('sample')->where('pid','=',$id)->get();
        
        return view('projects.edit',compact('project','tags','samples'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,CreateProjectRequest $request )
    {
        $project = Project::findOrFail($id);
        
        //edit sample1
        if($request['editprojectsample1'] != null){
            $fileName = 'user'.Auth::user()->id . 'sample1.' . 
                $request->file('editprojectsample1')->getClientOriginalExtension();

            $request->file('editprojectsample1')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample1'] = $fileName;
            DB::table('sample')->where('pid','=',$project->pid)->update(['sample1'=>$request['sample1']]);
         }
        
        //edit sample2
        if($request['editprojectsample2'] != null){

            $fileName = 'user'.Auth::user()->id . 'sample2.' . 
                $request->file('editprojectsample2')->getClientOriginalExtension();

            $request->file('editprojectsample2')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample2'] = $fileName;
            DB::table('sample')->where('pid','=',$project->pid)->update(['sample2'=>$request['sample2']]);

        }
        
        //edit sample3
        if($request['editprojectsample3'] != null){
            $fileName = 'user'.Auth::user()->id . 'sample3.' . 
                $request->file('editprojectsample3')->getClientOriginalExtension();

            $request->file('editprojectsample3')->move(

                $_SERVER["DOCUMENT_ROOT"].'/public/projectfiles', $fileName
            );
            $request['sample3'] = $fileName;
            DB::table('sample')->where('pid','=',$project->pid)->update(['sample3'=>$request['sample3']]);
        }

        $project->update($request->all());
        
        $tagIds = $request->input('tag_list');
        
        $project->tags()->sync($tagIds);

        return redirect()->route('projects.show', [$id => $project->pid]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
