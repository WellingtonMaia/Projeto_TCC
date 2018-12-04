<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\File;

class FileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = new File();
        $nameFile = null;
        $nameF = null;
        $icon = null;
        
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('file_url') && $request->file('file_url')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            // Recupera a extensão do arquivo
            $extension = $request->file_url->extension();
            // dd($extension);
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $icon = "{$extension}.png";
            // Adicionando o a extensao do arquivo no nome 
            $namef = "{$request->get('name')}.{$extension}";
            // Faz o upload:
            $upload = $request->file_url->storeAs('files', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }

        $file->file_url	   = $nameFile;
        $file->name        = $namef;
        $file->icon        = $icon;
        $file->task_id     = $request->get('task_id');
        $file->users_id    = $request->get('users_id');

        $file->save();

        $files = view('includes.file-item',['file'=>$file])->render();  

        return response()->json(['error'=>false,'html'=>$files], 200);

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $file = File::find($request->get('id'));
        $file->delete();

        return response()->json(['error'=>false,'status'=>true], 200);

    }
}
