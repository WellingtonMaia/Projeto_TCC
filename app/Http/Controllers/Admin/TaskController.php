<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use App\Models\Note;
use App\Models\Time;
use App\User;
use Gate;

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
        $tasks = Task::all();
        return view('pages.task')->with('tasks', $tasks);
    }

    public function create(){
        $projects = Project::all();
        $users = User::all();
        return view('forms.task_create')->with('projects', $projects)
                                        ->with('users', $users);
    }


    public function createFromProject($id){

        $project = Project::find($id);
        $users = User::all();

        return view('forms.task_create_from_project')->with('project', $project)
                                                     ->with('users', $users);
    }

    public function updateStatus(Request $request){

        $task = Task::find($request->get('id'));



        if($request->get('status') == "I"){
            $task->status = 'C';    
        }

        if($request->get('status') == "C"){
            $task->status = 'I';    
        }

        $task->save();

        return response()->json(['error'=>false,'status'=>$task->status], 200);
        

    }

    public function getUsers(Request $request){

        $project = Project::find($request->get('id'));

        if ($project) {
            $users = '';

            foreach ($project->users as $p) {
                $users .= '<option value="'.$p->id.'">'.$p->name.'</option>';
            }      

            if($users){
                return response()->json(['error'=>false,'html'=>$users], 200);
            }
        }

        return response()->json(['error'=>true,'html'=>'null'], 200);
        
        
    }

    public function store(){
        $task = new Task();

        $users = Input::get('users');
        if(empty($users)){
            Session::flash('message', 'Selecionar usuários!');
            return Redirect::to('projects');
        }

        $task->name           = Input::get('name');
        $task->description    = Input::get('description');
        // $task->estimate_date  = Carbon::parse(str_replace('/', '-',Input::get('estimate_date')))->format('Y-m-d');     
        $task->status         = Input::get('status');
        $task->estimate_time  = Input::get('estimate_time');
        $task->begin_date     = Carbon::parse(str_replace('/', '-',Input::get('begin_date')))->format('Y-m-d');     
        $task->final_date     = Carbon::parse(str_replace('/', '-',Input::get('final_date')))->format('Y-m-d');     
        $task->project_id     = Input::get('project');

        $task->save();


        foreach ($users as $user) {
            $task->users()->attach($user);
        }

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('projects');

    }

    public function show($id){
       $task = task::find($id);
       $projects = project::all();
       return view('forms.task_create')->with("task", $task)
                                       ->with("projects", $projects);
    }

    public function showInfo($id){
        $task = task::find($id);

        $users = $task->users()->get();

        $user = User::select(['id'])->whereIn('id',$users)->get()->toArray();


        foreach ($user as $s) {

            if($s['id'] != Auth::user()->id){
                $taskAccess = false;
            }else{
                $taskAccess = true;
            }
        }


        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            if($taskAccess == false){
                abort(403,"Sorry, You can do this action!");
            }
        }

       // $projects = User::find(Auth::user()->id)->projects()->get();

       return view('info.task_info')->with("task", $task);
    }

    public function edit($id){
        $task = task::find($id);

        $task->name           = Input::get('name');
        $task->description    = Input::get('description');
        // $task->estimate_date  = Carbon::parse(str_replace('/', '-',Input::get('estimate_date')))->format('Y-m-d');     
        $task->status         = Input::get('status');
        $task->estimate_time  = Input::get('estimate_time');
        $task->begin_date     = Carbon::parse(str_replace('/', '-',Input::get('begin_date')))->format('Y-m-d');     
        $task->final_date     = Carbon::parse(str_replace('/', '-',Input::get('final_date')))->format('Y-m-d');     
        $task->project_id     = Input::get('project');

        $task->save();

        foreach ($request->get('users') as $user) {
            $task->users()->attach($user);
        }    

        Session::flash('message', 'Cadastro editado com sucesso!');
        return Redirect::to('tasks');
    }


    public function delete($id){
        $task = Task::find($id);
        $task->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('tasks');
    }


    public function addTask(Request $request){

        $task = new Task();

        $task->project_id       = $request->get('project');   
        $task->name             = $request->get('name');
        $task->description      = $request->get('description');       
        // $task->estimate_date    = Carbon::parse(str_replace('/', '-',$request->get('estimate_date')))->format('Y-m-d');     
        $task->status           = $request->get('status');         
        $task->estimate_time    = $request->get('estimate_time');    
        $task->begin_date       = Carbon::parse(str_replace('/', '-',$request->get('begin_date')))->format('Y-m-d');      
        $task->final_date       = Carbon::parse(str_replace('/', '-',$request->get('final_date')))->format('Y-m-d');      

        $task->save();

        foreach ($request->get('users') as $user) {
            $task->users()->attach($user);
        }    

        $html = view('includes.task-item',['task'=>$task])->render();
                
        return response()->json(['error'=>false,'html'=>$html], 200);

    }


    public function editTask(Request $request){

        $task = Task::where('id', $request->get('id'))->first();

        $users = $task->users()->get();

        return response()->json(['error'=>false,'task'=>$task,'users'=>$users],200);
    }


    public function updateTask(Request $request){

        $task = Task::find($request->get('task_id'));

        $task->name             = $request->get('name');
        $task->description      = $request->get('description');       
        // $task->estimate_date    = Carbon::parse(str_replace('/', '-',$request->get('estimate_date')))->format('Y-m-d');  
        $task->estimate_time    = $request->get('estimate_time');    
        $task->begin_date       = Carbon::parse(str_replace('/', '-',$request->get('begin_date')))->format('Y-m-d');      
        $task->final_date       = Carbon::parse(str_replace('/', '-',$request->get('final_date')))->format('Y-m-d');        
        $task->save();

        $users = $request->get('users');

        $task->users()->sync($users);

        $us = User::select(['id','name'])->whereIn('id',$users)->get()->toArray();

        foreach ($us as $key => $user) {
            $us[$key]['name'] = Helper::getFirstNameString($user['name']);
        }
        
        return response()->json(['error'=>false,'task'=>$task,'users'=>$us], 200);
    }

    public function removeTask(Request $request){
        $task = Task::find($request->get('id'));
        $task->delete();

        return response()->json(['error'=>false,'status'=>true], 200);
    }

}
        // exemplo relacionamento
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



