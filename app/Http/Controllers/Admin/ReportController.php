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

        $date_ini = Carbon::parse(str_replace('/', '-',$request->get("date_ini")))->format('Y-m-d');
        $date_final = Carbon::parse(str_replace('/', '-',$request->get("date_final")))->format('Y-m-d');     
        
        $projects = DB::select("
            SELECT COUNT(projects.id) as total, created_at 
                FROM projects 
                    WHERE projects.status = 'A' AND 
                    (created_at BETWEEN '{$date_ini}' AND '{$date_final}')
                    GROUP BY DATE_FORMAT(created_at,'%Y%m%d')
        ");

        foreach ($projects as &$project){
            $project->created_at =  Carbon::parse($project->created_at)->format('d/m/Y');
        }

         return response()->json(['error'=>false,
                                  'projects'=>$projects,
                                  'date_ini'=>$date_ini,
                                  'date_final'=>$date_final], 200);

    }

    //->tempo gasto em cada projeto por pessoa
    //selecionar projeto ou pessoa;
    public function time_users_for_project(Request $request){

        $user_id = $request->get('id');

        $user = User::find($user_id);

        $userName = Helper::getFirstNameString($user->name);

        $projectsArray = $user->projects;

        foreach ($projectsArray as $key => $item) {

            $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->whereHas('tasks', function($q) use ($item){
                $q->where('project_id', $item->id);
            })->first();

            if($times->sumTimeValue == NULL){
                $times->sumTimeValue = '00:00:00';
            }

            $timeUser[$key]['time'] = $times->sumTimeValue;
      
        }
    
        return response()->json(['error'=>false,
                                 'times'=>$timeUser,
                                 'projects'=>$projectsArray,
                                 'user'=>$userName], 200);
        
    }
   
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

            $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->whereHas('tasks', function($q) use ($project_id){
                    $q->where('project_id', $project_id);
                })->first();

            if($times->sumTimeValue == NULL){
                $times->sumTimeValue = '00:00:00';
            }

            $timeUser[$key]['time'] = $times->sumTimeValue;

        }

        return response()->json(['error'=>false,'times'=>$timeUser,'users'=>$users], 200);
   
    }

    //->conclusao de tarefa por pessoa em um projeto
    public function finish_task_user_project(Request $request){
        $project_id = $request->get('id');
        
        $tasks = Task::select()->where('project_id', $project_id)->where('status','C')->get();

        $project = Project::find($project_id);
        
        $users = $project->users()->get();

        foreach ($users as $key => $user) {                    
            $users[$key]['name'] = Helper::getFirstNameString($user['name']);
        }

        foreach ($users as $key => $value) {

            $users[$key]['name'] = $value->name;

            $taskUser[$key] = $value->tasks()->where('project_id', $project_id)->where('status', 'C')->count();

        }

        return response()->json(['error'=>false,'tasks'=>$taskUser,'users'=>$users], 200);
    }

}
