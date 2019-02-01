<?php

namespace App\Http\Controllers\Admin;

use App\Models\Financial;
use App\Models\Project;
use App\Models\Time;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

class FinancialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $financials = Financial::all();

        return view('pages.financial')->with('financials', $financials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('forms.financial_create');
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
        if (Financial::find($id)){
            $financial = Financial::find($id);
            return view('forms.financial_create', $financial);
        }else{
            return redirect('/financials');
        }

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
        if (Financial::find($id)){
            $finalcial = Financial::find($id);
            return view('forms.financial_create', $finalcial);
        }else{
            return redirect('/financials');
        }
    }


    public function getInfo(Request $request){

        $financial = Financial::find($request->get('id'));

        $project = Project::find($financial->project_id);

        $project_id = $financial->project_id;

        $date_ini = date_create(Carbon::now()->format('Y-m-d'));    
        $due_date = date_create(Carbon::parse($financial->due_date)->format('Y-m-d'));    

        $diff = date_diff($date_ini,$due_date);
        $stringDate = $diff->format("%R %a dias");

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

        return response()->json(['error'=>false,
                                 'financial'=>$financial,
                                 'users'=>$users,
                                 'times'=>$timeUser,
                                 'dias'=>$stringDate], 200);


    }


}
