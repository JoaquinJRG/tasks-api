<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Cards
Route::get("/card", [CardController::class, "index"]);
Route::get("/card/{id}", [CardController::class, "show"]);
Route::post("/card", [CardController::class, "store"]);
Route::put("/card/{id}", [CardController::class, "update"]);
Route::delete("/card/{id}", [CardController::class, "destroy"]);

// Notes
Route::get("/note", [NoteController::class, "index"]);
Route::get("/note/{id}", [NoteController::class, "show"]);
Route::post("/note", [NoteController::class, "store"]);
Route::put("/note/{id}", [NoteController::class, "update"]);
Route::delete("/note/{id}", [NoteController::class, "destroy"]);

// Todos
Route::get("/todo", [TodoController::class, "index"]);
Route::get("/todo/{id}", [TodoController::class, "show"]);
Route::post("/todo", [TodoController::class, "store"]);
Route::put("/todo/{id}", [TodoController::class, "update"]);
Route::delete("/todo/{id}", [TodoController::class, "destroy"]);
