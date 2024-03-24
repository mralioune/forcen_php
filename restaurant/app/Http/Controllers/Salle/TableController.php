<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function afficheAll ()
    {
        $Tables = Table::all();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun Table"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Tables = Table::find($Id);
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Tables = Table::find($Id_statut);
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheSalle ($Id_salle)
    {
        $Tables = Table::find($Id_salle);
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
    public function afficheSalleStatut ($Id_salle,$Id_statut)
    {
        $Tables = Table::find($Id_salle,$Id_statut);
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
