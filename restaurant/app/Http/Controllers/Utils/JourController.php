<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Jour;
use Illuminate\Http\Request;

class JourController extends Controller
{
    //
    public function afficheAll ()
    {
        $Jours = Jour::all();
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun Jour"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Jours = Jour::find($Id);
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Jours = Jour::find($Id_statut);
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }


}
