<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    //-> projetos realizados durante um periodo
    public function date_for_project(/*Request $request*/){

        //$date_ini = $request->date_ini;
        //$date_final = $request->date_final;
        $date_ini = '2018-11-14';
        $date_final = '2018-11-16';
        $projects = Project::whereBetween('created_at', [$date_ini, $date_final])
        ->where('status','I')
        ->get();
        dd($projects);
        return view('info.report',compact('project'));
    }

    //->tempo gasto em cada projeto por pessoa
    //selecionar projeto ou pessoa;
    public function time_users_for_project(/*Request $request*/){

        //$user_id = $request->user_id;
        $user_id = 1;
        $project_id = DB::table('projects_has_users')
            ->select('project_id')
            ->where('user_id', $user_id)
            ->get();

        foreach($project_id as $p_id){
            $projects = DB::table('projects')
                ->select('name', 'client_name','estimate_time')
                ->where('id', $p_id->project_id)
                ->get();
        }

        //$projects = Project::where('id', [$date_ini, $date_final])->get();
        dd($projects);
        return view('info.report',compact('project'));
    }


    //->tempo gasto total de projetos por tempo
    //selecionar um projeto e listar todos os colaboradores relacionado
    //a ele e visualizar as horas trabalhadas
    public function project_for_users_times(/*Request $request*/){
        $project_id = $request->project_id;
    }

    //->conclusao de tarefa por pessoa em um projeto
    public function finish_task_user_project(/*Request $request*/){
        //$project_id = $request->project_id;
        $project_id = 5;
        $tasks = Task::where('project_id', 5)->where('status','C')->get();

        //$financial->project->name
        //dd($tasks->users);
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
