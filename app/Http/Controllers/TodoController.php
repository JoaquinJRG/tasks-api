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
        $todo = Todo::find($id);

        if (!isset( $todo )) return response()->json(["message" => "No existe"], 404); 

        return response()->json($todo, 200); 
    }

    public function store(Request $request) 
    {
        
        $request->validate([
            "text" => "required|string",
        ]);

        $todo = new Todo(); 
        $todo->text = $request->text; 
        $todo->save(); 

        return response()->json([
            "message" => "Todo creado",
            "data" => $todo
        ], 201); 

    }

    public function update($id)
    {
        $todo = Todo::find($id); 

        if (!isset($todo)) return response()->json(["message" => "No existe"], 404); 

        $todo->isDone = !$todo->isDone; 
        $todo->save(); 

        return response()->json([
            "message" => "Todo actualizado",
            "data" => $todo
        ]); 
    }

    public function destroy($id)
    {
        $todo = Todo::find($id); 

        if (!isset($todo)) return response()->json(["message" => "No existe"], 404); 

        $todo->delete(); 

        return response()->json(["message" => "Todo eliminado"], 200); 
    }

}
