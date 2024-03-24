<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function afficheAll ()
    {
        $Commandes = Commande::all();
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun Commande"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Commandes = Commande::find($Id);
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Commandes = Commande::find($Id_statut);
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
