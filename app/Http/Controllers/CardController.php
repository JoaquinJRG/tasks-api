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
        return "La carta de id: $id"; 
    }

    public function store() 
    {
        return "Carta creada"; 
    }

    public function update($id)
    {
        return "Carta de id: $id actualizada";
    }

    public function destroy($id)
    {
        return "Carta de id: $id eliminada"; 
    }

}
