<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\Time;
use App\User;
// use App\Models\Financial;

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
    public function index(Request $request)
    {
        $project = Project::count();
        $task = Task::count();        
        $user = User::count();
        // $times = Time::where( 'users_id ',Auth::user()->id);

        // foreach ($times as $time) {
        //     dd($time);
        // }
        
        // die;
        // dd($time);

        // $data = $request->session()->all();               

        return view('index')
               ->with("nproject", $project)
               ->with("ntask",$task)
               ->with("nuser",$user);
               
    }
}
