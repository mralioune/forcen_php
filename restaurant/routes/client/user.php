<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Users_clientController;
use App\Http\Controllers\Users\UserController;


Route::post("user",[UserController::class,"ajouterclient"]);

Route::put("userid/{id}",[UserController::class,"afficheId"]);
Route::post("login",[UserController::class,"connectionclient"]);
Route::post("forgetpassword",[UserController::class,"MotDePasseOublier"]);
Route::put("uservalide/{token}",[UserController::class,"valideToken"]);
Route::post("userpasswordchange/{token}",[UserController::class,"changepassword"]);

Route::get("messagetext",[UserController::class,"messagetext"]);
