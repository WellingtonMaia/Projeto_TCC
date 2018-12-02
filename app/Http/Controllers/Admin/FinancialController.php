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
        //

        $financials = Financial::all();
        //$projects = Project::all();

        return view('pages.financial')
            ->with('financials', $financials);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //var_dump($request->all());
       /* $financial = new Financial();
        $financial->fill($request->all());
        $validate = validator($request->all(),$financial->rules(), $financial->messages());

        dd($validate);exit();

        if($validate->fails())
        {
            return redirect('/financials/create')
                ->withErrors($validate)
                ->withInput();
        }else{
             $save = $financial->save();

            if ($save == true){
                return redirect('/financials')->with('status','Conta Cadastrada com Sucesso!');
            }
        }
        */
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



    public function getInfo(Request $request){

        $financial = Financial::find($request->get('id'));

        $project = Project::find($financial->project_id);

        $users = $project->users()->get();

        $date_ini = date_create(Carbon::now()->format('Y-m-d'));    
        $due_date = date_create(Carbon::parse($financial->due_date)->format('Y-m-d'));    

        $diff = date_diff($date_ini,$due_date);
        $stringDate = $diff->format("%R %a dias");

        foreach ($users as $key => $user) {
            $timeUser[$key]['time'] = "00:00:00";

            $users[$key]['name'] = Helper::getFirstNameString($user['name']);

            $times = Time::select()->where('users_id',$users[$key]['id'])->get()->toArray();

            // dd($times);

            foreach($times as $time){
                $timeUser[$key]['time'] = gmdate('H:i:s', strtotime( $timeUser[$key]['time'] ) + strtotime( $time['time_value'] ) );
            }

        }

        // dd($financial);
        return response()->json(['error'=>false,'financial'=>$financial,'users'=>$users,'times'=>$timeUser,'dias'=>$stringDate], 200);


    }


}
