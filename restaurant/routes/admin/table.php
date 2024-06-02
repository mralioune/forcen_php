<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Salle\TableController;

   

Route::get("alltable",[TableController::class,"afficheAll"]);
Route::get("table",[TableController::class,"afficheStatuts"]);
Route::put("tableid/{id}",[TableController::class,"afficheId"]);
Route::post("table",[TableController::class,"ajouter"]);
Route::post("tableid/{id}",[TableController::class,"modifier"]);    
Route::put("salletableid/{id}",[TableController::class,"afficheTableSalle"]);