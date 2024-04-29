<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use App\Models\Commande_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Commande_details_detailsController extends Controller
{
    //

    public function afficheId ($Id)
    {
        $Commande_details = Commande_details::where('Id',$Id)->get();
        if($Commande_details->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_details'=>$Commande_details
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_details'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheCommande ($Id_commande)
    {
        $Commande_details = Commande_details::where('Id_commande',$Id_commande)->get();
        if($Commande_details->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Commande_details'=>$Commande_details
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Commande_details'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
    
        $validation = Validator::make($request->all(),[
            "Id_commande" =>"required|string",
            "Id_plat" =>"required|string",
            "Quantite" =>"required|string",
            "Montant" =>"required|string",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Commande_details'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_detailsExist = Commande_details::where('Nom', $request->Nom)->get();
            if($Commande_detailsExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Commande_details'=> "cette detail existe déja"
                ],500) ;
            }
            else{
            
        
                $Commande_details = Commande_details::create([
                    "Id_commande" => $request->Id_commande,
                    "Id_plat" => $request->Id_plat,
                    "Quantite" => $request->Quantite,
                    "Montant" => $request->Montant,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Commande_details)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Commande_details'=> "vous venez d'ajouter une Commande details"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Commande_details'=> "une érreur est survenue lors de la creation"
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
                'Commande_statuts'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Commande_details = Commande_details::find($Id);
            if($Commande_details){
                $Commande_details->update([
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Commande_details'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
