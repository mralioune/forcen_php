<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Users_clientController;
use App\Http\Controllers\Users\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("user",[UserController::class,"afficheTout"]);
//Route::post("user_add",[Users_clientController::class,"ajouter"]);
Route::post("user",[UserController::class,"ajouter"]);

Route::put("userid/{id}",[UserController::class,"afficheId"]);
Route::post("userConnection",[UserController::class,"connection"]);

Route::post('/cart/add', [UserController::class,'addToCart']);
Route::delete('/cart/remove/{productId}', [UserController::class,'removeProductFromCart']);
Route::get('/cart/display', [UserController::class,'displayCart']);
