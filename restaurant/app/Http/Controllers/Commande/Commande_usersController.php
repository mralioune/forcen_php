<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Commande_usersController extends Controller
{
    //
    public function afficheId ($Id)
    {
        $Commande_users = Commande_users::where('Id',$Id)->get();
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
        $Commande_users = Commande_users::where('Id_commande',$Id_commande)->get();
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

    public function ajouter(Request $request)
    {
    
        $validation = Validator::make($request->all(),[
            "Id_commande" =>"required|string",
            "Id_table" =>"required|string",
            "Id_type_commande" =>"required|string",
            "Id_users_client" =>"required|string",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commande_users'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_usersExist = Commande_users::where('Nom', $request->Nom)->get();
            if($Commande_usersExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Commande_users'=> "cette Commande_users existe déja"
                ],500) ;
            }
            else{
            
        
                $Commande_users = Commande_users::create([
                    "Id_commande" => $request->Id_commande,
                    "Id_table" => $request->Id_table,
                    "Id_type_commande" => $request->Id_type_commande,
                    "Id_users_client" => $request->Id_users_client,
                    "Id_users_admin" => 0,
                    "id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Commande_users)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Commande_users'=> "vous venez d'ajouter une Commande_users"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Commande_users'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
            }

        }
    }

    public function modifier(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Id_statut" =>"required|string|max:255",
            "Id_users_admin" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commande_users'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_users = Commande_users::find($Id);
            if($Commande_users){
                $Commande_users->update([
                    "Id_statut" => $request->Id_statut,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Commande_users'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }

    
    public function modifierTable(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Id_table" =>"required|string|max:255",
            "Id_users_admin" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commandes'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_users = Commande_users::find($Id);
            if($Commande_users){
                $Commande_users->update([
                    "Id_table" => $request->Id_table,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Commande_users'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
