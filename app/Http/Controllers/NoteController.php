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
        return "La nota de id: $id"; 
    }

    public function store() 
    {
        return "Nota creada"; 
    }

    public function update($id)
    {
        return "Nota de id: $id actualizada";
    }

    public function destroy($id)
    {
        return "Nota de id: $id eliminada"; 
    }

}
