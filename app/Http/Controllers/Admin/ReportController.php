<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\Time;
use App\User;

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

    public function index_date_for_project(){
        return view('report.date_for_project');
    }

    public function index_time_users_for_project(){
        $users  = User::all();
        return view('report.time_users_for_project')->with('users',$users);
    }

    public function index_project_for_users_times(){
        $projects = Project::all();
        return view('report.project_for_users_time')->with('projects', $projects);
    }

    public function index_finish_task_user_project(){
        $projects = Project::all();
        return view('report.finish_task_user_project')->with('projects', $projects);
    }

    //-> projetos realizados durante um periodo
    public function date_for_project(/*Request $request*/){
        //dd($request->all());
        
        //$date_final = $request->date_final;
         $date_ini = '2018-01-01';
         $date_final = '2019-12-30';
        
        $period = 12;
        /*
        //$date_ini = Carbon::parse(str_replace('/', '-',$request->get('date_ini')))->format('Y-m-d');
        //$date_final = Carbon::parse(str_replace('/', '-',$request->get('date_final')))->format('Y-m-d')
        //            ->copy()->subMonths($period);*/
        
        //teste
        $date_ini = Carbon::parse(str_replace('/', '-',$date_ini))->format('Y-m-d');
        $date_final = Carbon::parse(str_replace('/', '-',$date_final))->format('Y-m-d');            
        
        
            $projects = Project::selectRaw("id, name, client_name, estimate_date, project_price, status, project_type, created_at")
            ->whereBetween("created_at", [$date_ini, $date_final])
            ->where('status','=','A')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y%m') "))
            ->orderBy("created_at")->get();
        

        
        //$projects = Project::whereBetween('created_at', [$date_ini, $date_final])
        //                    ->where('status','A')
        //                    ->get();
        
         dd($projects);

        // return view('info.report',compact('project'));
    }

    //->tempo gasto em cada projeto por pessoa
    //selecionar projeto ou pessoa;
    public function time_users_for_project(/*Request $request ou $id */){

        //$user_id = $request->user_id;
        $user_id = 8;
        $project_id = DB::table('projects_has_users')
            ->select('project_id')
            ->where('user_id', $user_id)
            ->get();
        
        if (!empty($project_id)) {
            foreach($project_id as $p_id){
                $projects = DB::table('projects')
                    ->select('name', 'client_name','estimate_time')
                    ->where('id', $p_id->project_id)
                    ->get();
            } 
            
            dd($projects);
        }

        

        //$projects = Project::where('id', [$date_ini, $date_final])->get();
        
        // return response()->json(['error'=>false,'html'=>$times], 200);
        // return view('info.report',compact('project'));
    }


    //->tempo gasto total de projetos por tempo
    //selecionar um projeto e listar todos os colaboradores relacionado
    //a ele e visualizar as horas trabalhadas
    public function project_for_users_times(/*Request $request*/){

        //$project_id = $request->project_id;

        $project_id = 12;
        $task_id = Task::where('project_id', $project_id)->get();
        
        if(!empty($task_id)){
            
            foreach($task_id as $t){
                $times[] = Time::where('task_id',$t->id)->get();
            }
            
            dd($times);
        }
        
    }

    //->conclusao de tarefa por pessoa em um projeto
    public function finish_task_user_project(/*Request $request ou $id */){
        //$project_id = $request->project_id;
        
        $project_id = 12;
        $tasks = Task::where('project_id', $project_id)->where('status','C')->get();
        
        dd($tasks);
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
