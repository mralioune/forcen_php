<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Type_commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Type_commandesController extends Controller
{
    //
    public function afficheAll ()
    {
        $Type_commandes = Type_commande::all();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun Type_commande"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Type_commandes = Type_commande::where('Id',$Id)->get();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Type_commandes = Type_commande::where('Id_statut',$Id_statut)->get();
        if($Type_commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Type_commandes'=>$Type_commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Type_commandes'=>"vous n'avez aucun élément"
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
                'Type_commandes'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Type_commandeExist = Type_commande::where('Nom', $request->Nom)->get();
            if($Type_commandeExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Type_commandes'=> "cette Type du jour existe déja"
                ],500) ;
            }
            else{
               
           
                $Type_commandes = Type_commande::create([
                    "Nom" => $request->Nom,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Type_commandes)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Type_commandes'=> "vous venez d'ajouter une Type"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Type_commandes'=> "une érreur est survenue lors de la creation"
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
                'Type_commandes'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = Type_commande::find($Id);
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
                    'Type_commandes'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
