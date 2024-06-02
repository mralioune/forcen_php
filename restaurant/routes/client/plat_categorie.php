<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plat\Plat_categorieController;

   


Route::get("categories",[Plat_categorieController::class,"afficheStatuts"]);
Route::put("categoriesid/{id}",[Plat_categorieController::class,"afficheId"]);