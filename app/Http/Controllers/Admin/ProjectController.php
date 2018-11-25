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
use Carbon\Carbon;
use App\Models\Project;
use App\Models\Financial;
use App\User;
use Gate;

class ProjectController extends Controller
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
    public function index(Project $project)
    {   
    
        $user = User::find(Auth::user()->id);

        $projects = $user->projects();
        //dd($project->users());
        //dd($projects);
        $projects = Project::all();
        //$projects = ;
        return view('pages.project')->with('projects', $projects);
    }

    public function create(){
        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(500,"Sorry, You can do this action!");
        }

        $users = User::all();
    	return view('forms.project_create')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(){
        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(403,"Sorry, You can do this action!");
        }

        $users                  = Input::get('users');

        $project                = new Project();
        $project->name          = Input::get('name');
        $project->estimate_date = Carbon::parse(str_replace('/', '-',Input::get('estimate_date')))->format('Y-m-d');
        $project->estimate_time = Input::get('estimate_time');
        $project->status        = Input::get('status');
        $project->project_price = Input::get('project_price');
        $project->project_type  = Input::get('project_type');
        $project->client_name   = Input::get('client_name');

        $project->save();

        $project_id = $project->id;

        if(!empty($project_id)){
            $financials = new Financial();
           $save = DB::table('financials')->insert([
                'project_id' => $project_id,
                'value' => $project->project_price,
                'date_ini' => $project->created_at,
                'due_date' => $estimate_date,
            ]);

           if($save){
               foreach ($users as $user) {
                   $project->users()->attach($user);
               }
               Session::flash('message', 'Cadastro registrado com sucesso!');
               return Redirect::to('projects');
           }else{
               Session::flash('message', 'Erro ao cadastrar Projeto!');
               return Redirect::to('projects');
           }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(403,"Sorry, You can do this action!");
        }

        $users = User::all();
        $project = Project::find($id);        
        return view('forms.project_create')->with("project", $project)
                                           ->with("users", $users);
    } 

    public function showInfo($id){

        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(403,"Sorry, You can do this action!");
        }

        $project = Project::find($id);                
        $users = User::all();
        return view('info.project_info')->with("project", $project)
                                        ->with("users", $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(403,"Sorry, You can do this action!");
        }

        $project = Project::find($id);
        $users   = Input::get('users');

        if(empty($users)){
            Session::flash('message', 'Selecionar usuários!');
            return Redirect::to('projects');
        }

        $project->name          = Input::get('name');
        $project->estimate_date = Carbon::parse(str_replace('/', '-',Input::get('estimate_date')))->format('Y-m-d');
        $project->estimate_time = Input::get('estimate_time');
        $project->status        = Input::get('status');
        $project->project_price = Input::get('project_price');
        $project->project_type  = Input::get('project_type');
        $save = $project->save();

        $project_id = $project->id;
        if(!empty($project_id)){

            $financial = Financial::where('project_id', '=', $project_id )->get()->first();
            $id = $financial->id;

            //dd([$project_id,$project->project_price, $id,$project->created_at, $estimate_date]);

                $financial->project_id = $project_id;
                $financial->value = $project->project_price;
                $financial->date_ini = $project->created_at;
                $financial->due_date = $estimate_date;
                $save = $financial->save();

            if($save){

                $project->users()->sync($users);
            
                Session::flash('message', 'Projeto editado com sucesso!');
                return Redirect::to('projects');
            }else{
                Session::flash('message', 'Erro ao editar Projeto!');
                return Redirect::to('projects');
            }
        }

    }


    public function delete($id){
        if (!Gate::allows('isAdmin', Auth::user()->permission)){
            abort(403,"Sorry, You can do this action!");
        }
        $project = Project::find($id);
        $project->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('projects');

    }

}
