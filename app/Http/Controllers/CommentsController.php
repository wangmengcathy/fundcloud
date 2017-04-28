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
        $reply_user = Input::get('reply_name');
        $body = Input::get('body');  
        $replied_id = Input::get('replied_id'); 
        $replied_name = Input::get('replied_name'); 
        $project->addComment($body, $replied_id, $replied_name);
        \Session::flash('flash_message', "Your comments added successfully!");
        return back();
    }
    

}
