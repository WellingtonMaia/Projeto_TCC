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
use App\User;

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
        $projects = DB::select('select * from projects');
        return view('forms.task_create')->with('projects', $projects);
    }

    public function store(){
        $task = new Task();

        $users = ['1','2'];

        // public function aulas(){
        //     return $this->belongsToMany('Modules\Produto\Entities\Sgr\Aula', 'materia_aula', 'materia_id', 'aula_id');                
        // }

       // if($registro->materias()->count()){
       //          foreach ($registro->materias as $materia){
       //              $duplicado->materias()->attach($materia->id, ['ordem'=>$materia->pivot->ordem]);
       //              foreach ($materia->aulas()->where('curso_id', $registro->id)->get() as $aula) {
       //                  $materia->aulas()->attach($aula->id,
       //                      ['nome_aula' => $aula->pivot->nome_aula,
       //                          'gratuito' => $aula->pivot->gratuito,
       //                          'curso_id' => $duplicado->id,
       //                          'tempo' => $aula->pivot->tempo,
       //                          'ordem'=>$aula->pivot->ordem]);
       //              }
       //          }
       //      }

        $estimate_date = Input::get('estimate_date'); $estimate_date = str_replace('/', '-', $estimate_date);  
        $estimate_date = date('Y-m-d', strtotime($estimate_date));

        $begin_date = Input::get('begin_date'); $begin_date = str_replace('/', '-', $begin_date);  
        $begin_date = date('Y-m-d', strtotime($begin_date));

        $final_date = Input::get('final_date'); $final_date = str_replace('/', '-', $final_date);  
        $final_date = date('Y-m-d', strtotime($final_date));

        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->estimate_date = $estimate_date;
        $task->status = Input::get('status');
        $task->estimate_time = Input::get('estimate_time');
        $task->begin_date = $begin_date;
        $task->final_date = $final_date;
        $task->project_id = Input::get('project');

        $task->save();

        foreach ($users as $user) {
            $task->users()->attach($user);
        }

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('tasks');
    }

    public function show($id){
       $task = task::find($id);
       $projects = DB::select('select * from projects');
       return view('forms.task_create')->with("task", $task)
                                       ->with("projects", $projects);
    }

    public function showInfo($id){
       $task = task::find($id);
       return view('info.task_info')->with("task", $task);
    }

    public function edit($id){
        $task = task::find($id);


        $estimate_date = Input::get('estimate_date'); $estimate_date = str_replace('/', '-', $estimate_date);  
        $estimate_date = date('Y-m-d', strtotime($estimate_date));

        $begin_date = Input::get('begin_date'); $begin_date = str_replace('/', '-', $begin_date);  
        $begin_date = date('Y-m-d', strtotime($begin_date));

        $final_date = Input::get('final_date'); $final_date = str_replace('/', '-', $final_date);  
        $final_date = date('Y-m-d', strtotime($final_date));

        $task->name = Input::get('name');
        $task->description = Input::get('description');
        $task->estimate_date = $estimate_date;
        $task->status = Input::get('status');
        $task->estimate_time = Input::get('estimate_time');
        $task->begin_date = $begin_date;
        $task->final_date = $final_date;
        $task->project_id = Input::get('project');
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




