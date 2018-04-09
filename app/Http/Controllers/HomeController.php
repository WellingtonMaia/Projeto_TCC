<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;
use App\Financial;

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
        $project = Project::count();
        $task = Task::count();
        $task = Task::count();
        $user = User::count();
        $financial = Financial::count();

        return view('index')
               ->with("nproject", $project)
               ->with("ntask",$task)
               ->with("nuser",$user)
               ->with("nfinancial",$financial);
    }
}
