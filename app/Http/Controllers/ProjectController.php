<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function create(){
    	return view('forms.project_create');
    }


    public function store(){
		$name = Input::get('name');
    	$estimate_date = Input::get('estimate_date');
    	$estimate_time = Input::get('estimate_time');
    	$status = Input::get('status');
    	$project_price = Input::get('project_price');
    	$project_type = Input::get('project_type');
    	$create_at = "2018-05-05 12:03:05";
    	

    	DB::insert('insert into projects values (?, ?, ?, ?, ?, ?)', 
    	array($name, $estimate_date, $estimate_time, $status, $project_price, $project_type));

    	return view('project')->with('name', $name);
    }


    public function edit(){

    }


    public function delete(){


    }

}
