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
        $Plats = Plat::where('Id',$Id)->get();
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
        $Plats = Plat::where('Id_statut',$Id_statut)->get();
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
        $Plats = Plat::where('Id_plat_categorie',$Id_plat_categorie)->get();
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
        $Plats = Plat::where('Id_plat_categorie',$Id_plat_categorie)->where('Id_statut',$Id_statut)->get();
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
