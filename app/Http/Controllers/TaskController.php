<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Task;
use App\Project;

class TaskController extends Controller
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
        $tasks = DB::select('select * from tasks');
        return view('task')->with('tasks', $tasks);
    }

    // public function create($id){
    //     $project = project::find($id);
    //     return view('forms.task_create')->with("project",$project);
    // }

    public function create(){
        $projects = DB::select('select * from projects');
        return view('forms.task_create')->with('projects', $projects);
    }

    public function store(){
        $task = new Task();

        // $projectId = DB::table('projects')->where('name', Input::get('project'))->first();        

        $estimate_date = Input::get('estimate_date'); $estimate_date = str_replace('/', '-', $estimate_date);  
        $estimate_date = date('Y-m-d', strtotime($estimate_date));

        $begin_date = Input::get('begin_date'); $begin_date = str_replace('/', '-', $begin_date);  
        $begin_date = date('Y-m-d', strtotime($begin_date));

        $final_date = Input::get('final_date'); $final_date = str_replace('/', '-', $final_date);  
        $final_date = date('Y-m-d', strtotime($final_date));

        // $begin_date = date_create_from_format('d/m/Y', Input::get('begin_date'));
        // $final_date = date_create_from_format('d/m/Y', Input::get('final_date'));

        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->estimate_date = $estimate_date;
        $task->status = Input::get('status');
        $task->estimate_time = Input::get('estimate_time');
        $task->begin_date = $begin_date;
        $task->final_date = $final_date;
        $task->project_id = Input::get('project');

        $task->save();

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('tasks');
    }

    public function show($id){
       $task = task::find($id);
       return view('forms.task_create')->with("task", $task);
    }

    public function showInfo($id){
       $task = task::find($id);
       return view('forms.task_create')->with("task", $task);
    }

    public function edit($id){
        $task = task::find($id);

        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->estimate_date = Input::get('estimate_date');
        $task->status = Input::get('status');
        $task->estimate_time = Input::get('estimate_time');
        $task->begin_date = Input::get('begin_date');
        $task->final_date = Input::get('final_date');
        $task->save();

        Session::flash('message', 'Cadastro editado com sucesso!');
        return Redirect::to('tasks');
    }


    public function delete($id){
        $task = task::find($id);
        $task->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('tasks');
    }


}




