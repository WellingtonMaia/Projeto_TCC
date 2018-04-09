<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        
    }


    public function edit(){

    }


    public function delete(){


    }
}
