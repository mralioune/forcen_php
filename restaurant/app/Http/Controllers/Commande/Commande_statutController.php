<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_statut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Commande_statutController extends Controller
{
    //
    public function afficheAll ()
    {
        $Commande_statuts = Commande_statut::all();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun Commande_statut"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Commande_statuts = Commande_statut::where('Id',$Id)->get();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Commande_statuts = Commande_statut::where('Id_statut',$Id_statut)->get();
        if($Commande_statuts->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_statuts'=>$Commande_statuts
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_statuts'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
    public function ajouter(Request $request)
    {
    
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commande_statuts'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_statutExist = Commande_statut::where('Nom', $request->Nom)->get();
            if($Commande_statutExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Commande_statuts'=> "cette statut existe déja"
                ],500) ;
            }
            else{
            
        
                $Commande_statuts = Commande_statut::create([
                    "Nom" => $request->Nom,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Commande_statuts)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Commande_statuts'=> "vous venez d'ajouter une statut"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Commande_statuts'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
            }

        }
    }

    public function modifier(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Id_statut" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commande_statuts'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = Commande_statut::find($Id);
            if($Users){
                $Users->update([
                    "Nom" => $request->Nom,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Commande_statuts'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
