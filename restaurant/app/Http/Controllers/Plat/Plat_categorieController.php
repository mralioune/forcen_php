<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Plat_categorie;
use Illuminate\Http\Request;

class Plat_categorieController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plat_categories = Plat_categorie::all();
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun Plat_categorie"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plat_categories = Plat_categorie::find($Id);
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Plat_categories = Plat_categorie::find($Id_statut);
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
