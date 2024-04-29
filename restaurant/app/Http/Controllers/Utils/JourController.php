<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Jour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JourController extends Controller
{
    //
    public function afficheAll ()
    {
        $Jours = Jour::all();
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun Jour"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Jours = Jour::where('Id',$Id)->get();
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Jours = Jour::where('Id_statut',$Id_statut)->get();
        if($Jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Jours'=>$Jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Jours'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $userExist = Jour::where('Nom', $request->Nom)->get();
            if($userExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Jours'=> "ce Jour existe déja"
                ],500) ;
            }
            else{
               
           
                $Users = Jour::create([
                    "Nom" => $request->Nom,
                    "id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Users)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Jours'=> "vous venez d'ajouter un Jour"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Roles'=> "une érreur est survenue lors de la creation"
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
                'Jours'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Jours = Jour::find($Id);
            if($Jours){
                $Jours->update([
                    "Nom" => $request->Nom,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Jours'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
