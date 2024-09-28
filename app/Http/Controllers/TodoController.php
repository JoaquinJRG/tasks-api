<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index()
    {
        $todos = Todo::all(); 

        return response()->json($todos, 200); 
    }

    public function show($id)
    {
        return "La tarea de id: $id"; 
    }

    public function store() 
    {
        return "Tarea creada"; 
    }

    public function update($id)
    {
        return "Tarea de id: $id actualizada";
    }

    public function destroy($id)
    {
        return "Tarea de id: $id eliminada"; 
    }

}
