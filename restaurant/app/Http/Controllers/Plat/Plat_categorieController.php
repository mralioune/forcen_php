<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Plat_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Plat_categorieController extends Controller
{
    //
    public function afficheAll ()
    {
        $Plat_categories = Plat_categorie::all();
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun Plat_categorie"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Plat_categories = Plat_categorie::where('Id',$Id)->get();
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Plat_categories = Plat_categorie::where('Id_statut',$Id_statut)->get();
        if($Plat_categories->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Plat_categories'=>$Plat_categories
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Plat_categories'=>"vous n'avez aucun élément"
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
                'Plat_categories'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Plat_categorieExist = Plat_categorie::where('Nom', $request->Nom)->get();
            if($Plat_categorieExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Plat_categories'=> "cette categories existe déja"
                ],500) ;
            }
            else{
               
           
                $Plat_categories = Plat_categorie::create([
                    "Nom" => $request->Nom,
                    "Id_plat_categorie" => $request->Id_plat_categorie,
                    "Description" => $request->Description,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Plat_categories)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Plat_categories'=> "vous venez d'ajouter une categories"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Plat_categories'=> "une érreur est survenue lors de la creation"
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
                'Plat_categories'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Plat_categories = Plat_categorie::find($Id);
            if($Plat_categories){
                $Plat_categories->update([
                    "Nom" => $request->Nom,
                    "Description" => $request->Description,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Plat_categories'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
