<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utils\JourController;

   

Route::get("jour",[JourController::class,"afficheStatuts"]);
Route::put("jourid/{id}",[JourController::class,"afficheId"]); 