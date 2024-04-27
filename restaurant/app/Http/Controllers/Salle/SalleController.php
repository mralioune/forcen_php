<?php

namespace App\Http\Controllers\Salle;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    //
    public function afficheAll ()
    {
        $Salles = Salle::all();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun Salle"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Salles = Salle::where('Id',$Id)->get();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Salles = Salle::where('Id_statut',$Id_statut)->get();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
