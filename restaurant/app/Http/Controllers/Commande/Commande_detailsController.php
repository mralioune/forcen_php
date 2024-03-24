<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_details;
use Illuminate\Http\Request;

class Commande_details_detailsController extends Controller
{
    //

    public function afficheId ($Id)
    {
        $Commande_details = Commande_details::find($Id);
        if($Commande_details->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_details'=>$Commande_details
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_details'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheCommande ($Id_commande)
    {
        $Commande_details = Commande_details::find($Id_commande);
        if($Commande_details->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_details'=>$Commande_details
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_details'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
