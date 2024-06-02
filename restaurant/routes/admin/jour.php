<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utils\JourController;

   

Route::get("alljour",[JourController::class,"afficheAll"]);
Route::get("jour",[JourController::class,"afficheStatuts"]);
Route::put("jourid/{id}",[JourController::class,"afficheId"]);
Route::post("jour",[JourController::class,"ajouter"]);
Route::post("jourid/{id}",[JourController::class,"modifier"]);    