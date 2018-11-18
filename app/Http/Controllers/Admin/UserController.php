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
use Illuminate\Http\File;
use App\User;

class UserController extends Controller
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
        $users = user::all();
        return view('pages.user')->with('users', $users);

    }

    public function create(){
        return view('forms.user_create');
    }

    public function store(){
        $user = new User();

        $image = Input::file("image");
        $extensao = $image->getClientOriginalExtension();

        $user->name = Input::get("name");
        $user->email = Input::get("email");
        $user->password = bcrypt(Input::get("password"));
        $user->role = 'Administrador';
        $user->status = Input::get("status");
        $user->permission = Input::get("permission");
        $user->image = "";
        $user->celular = Input::get("celular");
        $user->payment_by_hours = Input::get("payment_by_hours");
        $user->info = Input::get("info");
        $user->save();
           
        if (Input::file("image")) {
            Input::file('image')->move('/imagens-post/','user_'.$user->id.'.'.$extensao);            
            $user->image = '/imagens-post/user_'.$user->id.'.'.$extensao;
            $user->save();
        }

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('users');

    }

    public function show($id){
        $user = user::find($id);
        return view('forms.user_create')->with("user", $user);
    }

    public function showInfo($id){
        $user = user::find($id);
        return view('info.user_info')->with("user", $user);   
    }

    public function edit(Request $request){

        $id = $request->input('id_user');
        $user = user::find($id);

        /*if(Input::file("image") == ''){
            $user->image = "";    
        }else{
            $image = Input::file("image");
            $extensao = $image->getClientOriginalExtension();

            Input::file('image')->move('/imagens-post/','user_'.$user->id.'.'.$extensao);            
            $user->image = '/imagens-post/user_'.$user->id.'.'.$extensao;
        }*/

        if($request->image != null){
            $nameFile = null;
        }else{
            $nameFile = $user->image;
        }

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('users', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }


        try{

        $user->name = Input::get("name");
        $user->email = Input::get("email");
        // $user->password = Input::get("password");
        $user->image = $nameFile;
        $user->role = Input::get("role");
        $user->status = Input::get("status");
        $user->permission = Input::get("permission");
        $user->celular = Input::get("celular");
        $user->payment_by_hours = Input::get("payment_by_hours");
        $user->info = Input::get("info");

        $user->save();

        Session::flash('message', 'Cadastro editado com sucesso!');
        return Redirect::to('users');

        }catch (\Exception $exception){
            return $exception;
        }

}

    public function delete($id){
        $user = user::find($id);
        $user->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('users');
    }

}
