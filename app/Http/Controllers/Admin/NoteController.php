<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Note::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $note = new Note();

        $note->description = $request->get('description');
        $note->task_id     = $request->get('task_id');
        $note->users_id    = $request->get('users_id');

        $note->save();

        $notes = '<div class="iten-task">
                        <div class="img" title="'.Helper::getObjectUser($note->users_id)->name.'">
                           <img src="'.Helper::getImageUser($note->users_id).'">
                        </div>
                        <div class="note-desc">'.$note->description.'</div>
                       <a class="btn btn-danger removeNote" href="" data-id="'.$note->id.'" ><i class="fa fa-trash"></i></a>
                     </div>';

        return response()->json(['error'=>false,'html'=>$notes], 200);

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
    public function destroy(Request $request)
    {
        $note = Note::find($request->get('id'));
        $note->delete();
        
        return response()->json(['error'=>false,'status'=>true], 200);

    }
}
