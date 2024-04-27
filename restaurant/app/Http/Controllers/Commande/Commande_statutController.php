<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_statut;
use Illuminate\Http\Request;

class Commande_statutController extends Controller
{
    //
    public function afficheAll ()
    {
        $Commande_statuts = Commande_statut::all();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun Commande_statut"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Commande_statuts = Commande_statut::where('Id',$Id)->get();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Commande_statuts = Commande_statut::where('Id_statut',$Id_statut)->get();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
