<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plat\PlatController;


   

Route::get("allplat",[PlatController::class,"afficheAll"]);
Route::get("plat",[PlatController::class,"afficheStatuts"]);
Route::put("platid/{id}",[PlatController::class,"afficheId"]);
Route::post("plat",[PlatController::class,"ajouter"]);
Route::post("platid/{id}",[PlatController::class,"modifier"]);    