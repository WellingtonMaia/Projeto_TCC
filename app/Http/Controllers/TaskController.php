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

    public function create(){
        return view('forms.task_create');
    }

    public function store(){
        $task = new Task();

        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->estimate_date = Input::get('estimate_date');
        $task->status = Input::get('status');
        $task->estimate_time = Input::get('estimate_time');
        $task->begin_date = Input::get('begin_date');
        $task->final_date = Input::get('final_date');

        $task->save();

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('tasks');
    }

    public function show($id){
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




