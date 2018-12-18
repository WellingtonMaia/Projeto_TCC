<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Helpers\Helper;
use App\Models\Task;
use App\Models\Time;
use App\User;
use Carbon\Carbon;
// use App\Models\Financial;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $projectCount = Project::count();
        $taskCount    = Task::count();        
        $userCount    = User::count();

        $user = User::find(Auth::user()->id);

        $userName = Helper::getFirstNameString(Auth::user()->name);

        $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTime')->where('users_id',$user->id)->first();

        $timeValue = $times->sumTime;

        // grafic showing all the time that the used that is logged have been spen

            // $userName = Helper::getFirstNameString($user->name);

            // $projectsArray = $user->projects;

            // foreach ($projectsArray as $key => $item) {

            //     $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->whereHas('tasks', function($q) use ($item){
            //         $q->where('project_id', $item->id);
            //     })->first();

            //     if($times->sumTimeValue == NULL){
            //         $times->sumTimeValue = '00:00:00';
            //     }

            //     $timeUser[$key]['time'] = $times->sumTimeValue;
          
            // }

        // end

            // dd($projectsArray);

        return view('index')
               ->with("nproject", $projectCount)
               ->with("ntask",    $taskCount)
               ->with("nuser",    $userCount)
               ->with("ntime",    $timeValue)
               ->with("userG",    $userName);


    }

    public function graficTimeProjects(Request $request){

            $user = User::find(Auth::user()->id);

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
                                     'projects'=>$projectsArray], 200);


    }


}
