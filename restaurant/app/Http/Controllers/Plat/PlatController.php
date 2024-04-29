<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlatController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plats = Plat::all();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun Plat"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plats = Plat::where('Id',$Id)->get();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Plats = Plat::where('Id_statut',$Id_statut)->get();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlatCategorie ($Id_plat_categorie)
    {
        $Plats = Plat::where('Id_plat_categorie',$Id_plat_categorie)->get();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatCategorieStatuts ($Id_plat_categorie,$Id_statut)
    {
        $Plats = Plat::where('Id_plat_categorie',$Id_plat_categorie)->where('Id_statut',$Id_statut)->get();
        if($Plats->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plats'=>$Plats
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plats'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Id_plat_categorie" =>"required|string",
            "Description" =>"required|string|max:555",
            "Id_users_admin" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Plats'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $PlatExist = Plat::where('Nom', $request->Nom)->get();
            if($PlatExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Plats'=> "cette Salle existe déja"
                ],500) ;
            }
            else{
               
           
                $Plats = Plat::create([
                    "Nom" => $request->Nom,
                    "Id_plat_categorie" => $request->Id_plat_categorie,
                    "Description" => $request->Description,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Plats)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Plats'=> "vous venez d'ajouter une Plats"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Plats'=> "une érreur est survenue lors de la creation"
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
                'Plats'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Plats = Plat::find($Id);
            if($Plats){
                $Plats->update([
                    "Nom" => $request->Nom,
                    "Description" => $request->Description,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Plats'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
