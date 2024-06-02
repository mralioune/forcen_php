<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Users_clientController;
use App\Http\Controllers\Users\UserController;

Route::get("user",[UserController::class,"afficheTout"]);
Route::post("user",[UserController::class,"ajouteradmin"]);

Route::put("userid/{id}",[UserController::class,"afficheId"]);
Route::post("login",[UserController::class,"connectionadmin"]);
Route::post("forgetpassword",[UserController::class,"MotDePasseOublier"]);
Route::put("uservalide/{token}",[UserController::class,"valideToken"]);
Route::post("userpasswordchange/{token}",[UserController::class,"changepassword"]);

Route::get("userclientall",[UserController::class,"afficheToutClient"]);
Route::get("useradminall",[UserController::class,"afficheToutAdmin"]);

Route::get("messagetext",[UserController::class,"messagetext"]);
