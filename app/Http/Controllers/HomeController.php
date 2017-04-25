<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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
        return view('home');
    }

    public function search($search_content){

        $search_result = Project::where('pname', $search_content)
    ->orWhere('pname', 'like', '%' . $search_content . '%')->orWhere('desp', 'like', '%' . $search_content . '%')->limit(10)->get();

        return view('search/index', compact('search_result'));

    }
}
