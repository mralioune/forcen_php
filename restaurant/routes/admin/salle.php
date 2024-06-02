<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Salle\SalleController;
use App\Http\Controllers\Salle\TableController;

   

Route::get("allsalle",[SalleController::class,"afficheAll"]);
Route::get("salle",[SalleController::class,"afficheStatuts"]);
Route::put("salleid/{id}",[SalleController::class,"afficheId"]);
Route::post("salle",[SalleController::class,"ajouter"]);
Route::post("salleid/{id}",[SalleController::class,"modifier"]);    