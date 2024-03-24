<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Menu_jour;
use Illuminate\Http\Request;

class Menu_jourController extends Controller
{
    //
    public function afficheAll ()
    {
        $Menu_jours = Menu_jour::all();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun Menu_jour"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Menu_jours = Menu_jour::find($Id);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Menu_jours = Menu_jour::find($Id_statut);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlat ($Id_plat)
    {
        $Menu_jours = Menu_jour::find($Id_plat);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheJour ($Id_jour)
    {
        $Menu_jours = Menu_jour::find($Id_jour);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatStatuts ($Id_plat,$Id_statut)
    {
        $Menu_jours = Menu_jour::find($Id_plat,$Id_statut);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
    public function afficheJouStatuts ($Id_jour,$Id_statut)
    {
        $Menu_jours = Menu_jour::find($Id_jour,$Id_statut);
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
