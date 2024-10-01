<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    
    public function index()
    {
        $cards = Card::all(); 

        return response()->json($cards, 200); 
    }

    public function show($id)
    {
        $card = Card::find($id);

        if (!isset( $card )) return response()->json(["message" => "No existe"], 404);

        return response()->json($card, 200); 
    }

    public function store(Request $request) 
    {
        $request->validate([
            "title" => "required|string",
            "column" => "required|string",
        ]); 

        $card = new Card(); 

        $card->title = $request->title; 
        $card->column = $request->column; 
        $card->save(); 

        return response()->json([
            "message" => "Card creada",
            "data" => $card
        ], 201); 
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "title" => "required|string",
            "column" => "required|string",
        ]); 

        $card = Card::find($id); 

        $card->title = $request->title; 
        $card->column = $request->column; 
        $card->save(); 

        return response()->json([
            "message" => "Card actualizada",
            "data" => $card
        ], 200);

    }

    public function destroy($id)
    {
        $card = Card::find($id); 

        if (!isset($card)) return response()->json(["message" => "No existe"], 404); 

        $card->delete(); 

        return response()->json(["message" => "Card eliminada"], 200); 
    }

}
