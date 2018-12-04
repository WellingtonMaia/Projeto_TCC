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
use App\Models\Time;
use App\User;

class TimeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    	$time = new Time();

        $time->time_value = $request->get('time_value');
    	$time->date       = Carbon::parse(str_replace('/', '-',$request->get('date')))->format('Y-m-d');
    	$time->time_start = $request->get('time_start');
    	$time->time_stop  = $request->get('time_stop');
    	$time->task_id    = $request->get('task_id');
    	$time->users_id   = $request->get('users_id');

    	$time->save();

        $times = view('includes.time-item',['time'=>$time])->render();

        return response()->json(['error'=>false,'html'=>$times], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $time = Time::find($request->get('id'));
        return response()->json(['error'=>false,'time'=>$time],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $time = Time::find($request->get('time_id'));

        $time->time_value = $request->get('time_value');
        $time->date       = Carbon::parse(str_replace('/', '-',$request->get('date')))->format('Y-m-d');
        $time->time_start = $request->get('time_start');
        $time->time_stop  = $request->get('time_stop');
        $time->task_id    = $request->get('task_id');
        $time->users_id   = $request->get('users_id');

        $time->save();

        return response()->json(['error'=>false,'time'=>$time],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $time = Time::find($request->get('id'));
        $time->delete();

        return response()->json(['error'=>false,'status'=>true], 200);
    }

}
