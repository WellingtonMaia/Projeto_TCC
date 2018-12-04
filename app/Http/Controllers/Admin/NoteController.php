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

        $notes = view('includes.note-item',['note'=>$note])->render();

        return response()->json(['error'=>false,'html'=>$notes], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $note = Note::find($request->get('id'));
        return response()->json(['error'=>false,'note'=>$note],200);
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
        $note = Note::find($request->get('note_id'));

        $note->description = $request->get('description');
        $note->task_id     = $request->get('task_id');
        $note->users_id    = $request->get('users_id');

        $note->save();   

        return response()->json(['error'=>false,'note'=>$note]);
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
