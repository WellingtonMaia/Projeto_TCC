<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Project;

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
    public function index()
    {
    	$projects = DB::select('select * from projects');
        return view('project')->with('projects', $projects);
    }

    public function showRegistrationForm(){
    	return view('forms.project_create');
    }

    public function create(Request $request){


    	$project = new Project;
    	$project->nome = Input::get('name');
    	$project->estimate_date = Input::get('estimate_date');
    	$project->estimate_time = Input::get('estimate_time');
    	$project->status = Input::get('status');
    	$project->project_price = Input::get('project_price');
    	$project->project_type = Input::get('project_type');

    	$project->save();

    	// $project = Project::create([
    	// 	'name' => $data['name']	,
    	// 	'estimate_date' => $data['estimate_date'],
    	// 	'estimate_time' => $date['estimate_time'],
    	// 	'status' => $date['status'],
    	// 	'project_price' => $date['project_price'],
    	// 	'project_type' => $date['project_type']
    	// 	]);


    	Session::flash('message', 'Cadastro registrado com sucesso!');
    	return Redirect::to('projects/');
    	
    }


    public function edit(){

    }


    public function delete(){


    }

}
