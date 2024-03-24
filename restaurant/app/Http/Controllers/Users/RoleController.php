<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function afficheAll ()
    {
        $Roles = Role::all();
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun role"
            ],404) ;
        }
    }


    public function afficheId ($id)
    {
        $Roles = Role::find($id);
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Roles = Role::find($Id_statut);
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
}
