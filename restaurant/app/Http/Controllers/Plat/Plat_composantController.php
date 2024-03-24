<?php

namespace App\Http\Controllers\Plat_composant;

use App\Http\Controllers\Controller;
use App\Models\Plat_composant;
use Illuminate\Http\Request;

class Plat_composantController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plat_composants = Plat_composant::all();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun Plat_composant"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plat_composants = Plat_composant::find($Id);
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Plat_composants = Plat_composant::find($Id_statut);
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlat ($Id_plat)
    {
        $Plat_composants = Plat_composant::find($Id_plat);
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatStatuts ($Id_plat,$Id_statut)
    {
        $Plat_composants = Plat_composant::find($Id_plat,$Id_statut);
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
