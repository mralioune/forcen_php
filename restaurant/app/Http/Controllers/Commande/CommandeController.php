<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommandeController extends Controller
{
    //
    public function afficheAll ()
    {
        $Commandes = Commande::all();
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun Commande"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Commandes = Commande::where('Id',$Id)->get();
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Commandes = Commande::where('Id_statut',$Id_statut)->get();
        if($Commandes->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commandes'=>$Commandes
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commandes'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
    
        $validation = Validator::make($request->all(),[
            "Montant" =>"required|string",
            "Id_users_client" =>"required|string"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commandes'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $CommandeExist = Commande::where('Nom', $request->Nom)->get();
            if($CommandeExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Commandes'=> "cette Commande existe déja"
                ],500) ;
            }
            else{
            
        
                $Commandes = Commande::create([
                    "Montant" => $request->Montant,
                    "Id_users_client" => $request->Id_users_client,
                    "Numero_reference" => Commande::generateReference(),
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Commandes)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Commandes'=> "vous venez d'ajouter une Commande"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Commandes'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
            }

        }
    }

    public function modifier(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Id_statut" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commandes'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commandes = Commande::find($Id);
            if($Commandes){
                $Commandes->update([
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Commandes'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
