<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\Time;
use App\User;
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
        $project = Project::count();
        $task = Task::count();        
        $user = User::count();
        // $times = Time::where( 'user_id ',Auth::user()->id)->get();

        // $times = Time::select()->whereIn('user_id',Auth::user()->id)->get();
        // $times = Time::select()->where('users_id',Auth::user()->id)->get()->toArray();

        $times = $user->times()->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_value))) as sumTimeValue')->where('users_id',$user->id)->first();


        $timeValue = $times->sumTimeValue;
        // dd($times);
        // dd($timeValue);
        // $TOTAL_HORAS_MANHA = gmdate('H:i:s', strtotime( 12:00:00 ) - strtotime( 09:00:00] ) );        
        // die;
        // dd($time);
        // $data = $request->session()->all();              

        return view('index')
               ->with("nproject", $project)
               ->with("ntask",$task)
               ->with("nuser",$user)
               ->with("ntime",$timeValue);
    }
}
