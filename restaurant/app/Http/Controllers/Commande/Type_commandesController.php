<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Type_commande;
use Illuminate\Http\Request;

class Type_commandesController extends Controller
{
    //
    public function afficheAll ()
    {
        $Type_commandes = Type_commande::all();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun Type_commande"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Type_commandes = Type_commande::where('Id',$Id)->get();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Type_commandes = Type_commande::where('Id_statut',$Id_statut)->get();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
