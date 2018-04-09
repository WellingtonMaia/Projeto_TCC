<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Financial;

class FinancialController extends Controller
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
        $financials = DB::select('select * from financials');
        return view('financial')->with('financials', $financials);
    }


    public function create(){
        return view('forms.financial_create');
    }

    
    public function store(){
        
        $financial = new Financial();

        $financial->name = Input::get('name');
        $financial->status = Input::get('status');
        $financial->due_date = Input::get('due_date');
        $financial->account_type = Input::get('account_type');
        $financial->value = Input::get('value');
        $financial->description = Input::get('description');
        $financial->tags = Input::get('tags');
        $financial->financial_classification = Input::get('financial_classification');
        $financial->cost_center = Input::get('cost_center');
        $financial->save();
        
        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('financials');
    }


    public function show($id){
        $financial = financial::find($id);
        return view('forms.financial_create')->with("financial",$financial);
    }

    public function edit($id){
        $financial = financial::find($id);

        $financial->name = Input::get('name');
        $financial->status = Input::get('status');
        $financial->due_date = Input::get('due_date');
        $financial->account_type = Input::get('account_type');
        $financial->value = Input::get('value');
        $financial->description = Input::get('description');
        $financial->tags = Input::get('tags');
        $financial->financial_classification = Input::get('financial_classification');
        $financial->cost_center = Input::get('cost_center');
        $financial->save();
        
        Session::flash('message', 'Cadastro editado com sucesso!');
        return Redirect::to('financials');
    }


    public function delete($id){
        $financial = financial::find($id);
        $financial->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('financials');


    }
}
