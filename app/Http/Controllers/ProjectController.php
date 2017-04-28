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
        $project = new Project($request->all());
        
        Auth::user()->posts()->save($project);
        
        $tagIds = $request->input('tag_list');
        
        $project->tags()->attach($tagIds);
        
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
                                ->select('comments.body', 'users.name', 'comments.created_at', 'comments.user_id')
                                ->get();
        $pledge_record = DB::table('project_user')
                             ->where('project_pid', '=', $id)
                             ->get();

        return view('projects.show',
            compact('project','creater','count','already_like','comments_author', 'pledge_record'));
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
        
        return view('projects.edit',compact('project','tags'));
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
        
        $project->update($request->all());
        
        $tagIds = $request->input('tag_list');
        
        $project->tags()->sync($tagIds);

        return redirect()->route('projects.show', [$id => $id]);
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
