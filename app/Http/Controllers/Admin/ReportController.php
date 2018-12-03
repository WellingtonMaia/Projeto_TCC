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
use App\Helpers\Helper;

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
    public function date_for_project(Request $request){
        //dd($request->all());
        

        $date_ini = $request->get("date_ini");
        $date_final = $request->get("date_final");
        //$date_final = $request->date_final;
        // $date_ini = '2018-01-01';
        // $date_final = '2019-12-30';
        
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
        
         // dd($projects);

         return response()->json(['error'=>false,'times'=>$timeUser,'projects'=>$projects,'date_ini'=>$date_ini,'date_final'=>$date_final], 200);

        // return view('info.report',compact('project'));
    }

    //->tempo gasto em cada projeto por pessoa
    //selecionar projeto ou pessoa;
    public function time_users_for_project(Request $request){

        $user_id = $request->get('id');

        $user = User::find($user_id);

        $userName = Helper::getFirstNameString($user->name);

        $projectsArray = $user->projects;

        foreach ($projectsArray as $key => $item) {
              
            // $timeUser[$item->id]['time'] = "00:00:00";

            $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->whereHas('tasks', function($q) use ($item){
                $q->where('project_id', $item->id);
            })->first();

            if($times->sumTimeValue == NULL){
                $times->sumTimeValue = '00:00:00';
            }

            $timeUser[$key]['time'] = $times->sumTimeValue;
      
        }
    
        return response()->json(['error'=>false,'times'=>$timeUser,'projects'=>$projectsArray,'user'=>$userName], 200);
        
    }


        

        //$projects = Project::where('id', [$date_ini, $date_final])->get();
        
        // return response()->json(['error'=>false,'html'=>$times], 200);
        // return view('info.report',compact('project'));
   


    //->tempo gasto total de projetos por tempo
    //selecionar um projeto e listar todos os colaboradores relacionado
    //a ele e visualizar as horas trabalhadas
    public function project_for_users_times(Request $request){

        $project_id = $request->get('id');

        $tasks = Task::where('project_id', $project_id)->get();

        $project = Project::find($project_id);

        $users = $project->users()->get();

        foreach ($users as $key => $user) {
            $timeUser[$key]['time'] = "00:00:00";   

            $users[$key]['name'] = Helper::getFirstNameString($user['name']);

            // $times = Time::select()->where('users_id',$users[$key]['id'])->get()->toArray();

            // if($user->id == 8){
            $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->whereHas('tasks', function($q) use ($project_id){
                    $q->where('project_id', $project_id);
                })->first();
            // }

            // $times = $user->times()->whereHas('tasks', function($q) use ($project_id){
            //     $q->where('project_id', $project_id);
            // })->sum('time_value');

            if($times->sumTimeValue == NULL){
                $times->sumTimeValue = '00:00:00';
            }

            $timeUser[$key]['time'] = $times->sumTimeValue;

            // $times = $user->times()->whereHas('tasks', function($q) use ($project_id){
            //     $q->where('project_id', $project_id);
            // })->get();
            #$times = $user->times;

            // dd($times);
            // $f = ':';

            // $user->sum_time_value = sprintf("%02d%s%02d%s%02d", floor($times/3600), $f, ($times/60)%60, $f, $times%60);
            // $user->sum_time_value = $times; 

            // $timeUser[$key]['time'] = date('H:i:s',$times); 



            // $time = gmdate('H:i:s', strtotime( $times));


            // dd($time);

            // foreach($times as $time){
            //     $timeUser[$key]['time'] = gmdate('H:i:s', strtotime( $timeUser[$key]['time'] ) + strtotime( $time['time_value'] ) );
            // }
        }

        // dd($users);

  
        return response()->json(['error'=>false,'times'=>$timeUser,'users'=>$users], 200);
   
    }

    //->conclusao de tarefa por pessoa em um projeto
    public function finish_task_user_project(Request $request){
        $project_id = $request->get('id');
        
        $tasks = Task::select()->where('project_id', $project_id)->where('status','C')->get();

        // dd(count($tasks));

        $project = Project::find($project_id);
        
        $users = $project->users()->get();

        foreach ($users as $key => $user) {                    
            $users[$key]['name'] = Helper::getFirstNameString($user['name']);
        }


        // foreach ($project as $key => $p) {
            

        // }


        // foreach ($tasks as $key => $task) {
            
        //     $users = $task->users()->get();



        // }

        foreach ($users as $key => $value) {

            $users[$key]['name'] = $value->name;

            $taskUser[$key] = $value->tasks()->where('project_id', $project_id)->where('status', 'C')->count();

        }
        
        return response()->json(['error'=>false,'tasks'=>$taskUser,'users'=>$users], 200);

        
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
