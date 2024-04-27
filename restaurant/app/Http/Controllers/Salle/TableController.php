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
        $Tables = Table::where('Id',$Id)->get();
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
        $Tables = Table::where('Id_statut',$Id_statut)->get();
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
        $Tables = Table::where('Id_salle',$Id_salle)->get();
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
        $Tables = Table::where('Id_salle',$Id_salle)->where('Id_statut',$Id_statut)->get();
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
