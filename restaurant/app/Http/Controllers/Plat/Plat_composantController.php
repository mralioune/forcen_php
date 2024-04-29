<?php

namespace App\Http\Controllers\Plat_composant;

use App\Http\Controllers\Controller;
use App\Models\Plat_composant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Plat_composantController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plat_composants = Plat_composant::all();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun Plat_composant"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plat_composants = Plat_composant::where('Id',$Id)->get();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Plat_composants = Plat_composant::where('Id_statut',$Id_statut)->get();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlat ($Id_plat)
    {
        $Plat_composants = Plat_composant::where('Id_plat',$Id_plat)->get();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatStatuts ($Id_plat,$Id_statut)
    {
        $Plat_composants = Plat_composant::where('Id_plat',$Id_plat)->where('Id_plat',$Id_statut)->get();
        if($Plat_composants->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_composants'=>$Plat_composants
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_composants'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Id_plat_categorie" =>"required|string|max:255",
            "Description" =>"required|string|max:555",
            "Id_users_admin" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Plat_composants'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Plat_composantExist = Plat_composant::where('Nom', $request->Nom)->get();
            if($Plat_composantExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Plat_composants'=> "cette composants existe déja"
                ],500) ;
            }
            else{
               
           
                $Plat_composant = Plat_composant::create([
                    "Nom" => $request->Nom,
                    "Id_plat_categorie" => $request->Id_plat_categorie,
                    "Description" => $request->Description,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Plat_composant)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Plat_composants'=> "vous venez d'ajouter un composants"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Plat_composants'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
            }

        }
        
    }

    public function modifier(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Description" =>"required|string|max:555",
            "Id_statut" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Plat_composants'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Plat_composants = Plat_composant::find($Id);
            if($Plat_composants){
                $Plat_composants->update([
                    "Nom" => $request->Nom,
                    "Description" => $request->Description,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Plat_composants'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
