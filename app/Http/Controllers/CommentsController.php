<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use Input;
use Auth;
//use App\Http\Requests\CreateCommentsRequest;
class CommentsController extends Controller
{
    public function store(Project $project){
       
        $this->validate(request(),['body'=>'required|min:2']);    
        $project->addComment(request('body'));
        \Session::flash('flash_message', "Your comments added successfully!");
        return back();
    }
    

}
