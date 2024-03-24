<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_users;
use Illuminate\Http\Request;

class Commande_usersController extends Controller
{
    //
    public function afficheId ($Id)
    {
        $Commande_users = Commande_users::find($Id);
        if($Commande_users->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_users'=>$Commande_users
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_users'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheCommande ($Id_commande)
    {
        $Commande_users = Commande_users::find($Id_commande);
        if($Commande_users->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_users'=>$Commande_users
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_users'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
