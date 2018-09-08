<?php

namespace App\Http\Controllers\Admin;

use App\Models\Financial;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //var_dump($request->all());
        $financial = new Financial();
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
}
