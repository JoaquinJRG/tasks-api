<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::all(); 

        return response()->json($notes, 200); 
    }

    public function show($id)
    {
        $note = Note::find($id); 

        if (!isset( $note )) return response()->json(["message" => "No existe"], 404); 

        return response()->json($note, 200);
    }

    public function store(Request $request) 
    {
        $request->validate([
            "title" => "required|string",
            "text" => "required|string",
            "color" => "required|string" 
        ]); 

        $note = new Note(); 

        $note->title = $request->title; 
        $note->text = $request->text; 
        $note->color = $request->color; 
        $note->save(); 

        return response()->json([
            "message" => "Nota creada",
            "data" => $note
        ], 201); 
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "text" => "required|string",
            "color" => "required|string"
        ]); 

        $note = Note::find($id); 

        $note->title = $request->title;
        $note->text = $request->text;
        $note->color = $request->color;
        $note->save(); 

        return response()->json([
            "message" => "Nota actualizada",
            "data" => $note
        ], 201); 

    }

    public function destroy($id)
    {
        $note = Note::find($id); 

        if (!isset($note)) return response()->json(["message" => "No existe"], 404); 

        $note->delete(); 

        return response()->json(["message" => "Nota eliminada"], 200); 
    }

}
