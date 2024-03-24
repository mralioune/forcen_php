<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plats = Plat::all();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun Plat"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plats = Plat::find($Id);
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Plats = Plat::find($Id_statut);
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlatCategorie ($Id_plat_categorie)
    {
        $Plats = Plat::find($Id_plat_categorie);
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatCategorieStatuts ($Id_plat_categorie,$Id_statut)
    {
        $Plats = Plat::find($Id_plat_categorie,$Id_statut);
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
