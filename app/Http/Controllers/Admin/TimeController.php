<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Time;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\User;

class TimeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($task_id, Request $request){

    	$task = Task::find($task_id);

    	$time = new Time();

    	$time->time = Input::('time');
    	$time->begin_date = Input::('begin_date');
    	$time->final_date = Input::('final_date');
    	$time->task_id = $task_id;
    	$time->user_id = Input::('user');

    	$time->save();

    	Session::flash('message', 'Cadastro registrado com sucesso!');
    	return Redirect::to('info.task_info'.$task_id);

    }
}
