<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plat\Plat_categorieController;


   

Route::get("allcategories",[Plat_categorieController::class,"afficheAll"]);
Route::get("categories",[Plat_categorieController::class,"afficheStatuts"]);
Route::put("categoriesid/{id}",[Plat_categorieController::class,"afficheId"]);
Route::post("categories",[Plat_categorieController::class,"ajouter"]);
Route::post("categoriesid/{id}",[Plat_categorieController::class,"modifier"]);    