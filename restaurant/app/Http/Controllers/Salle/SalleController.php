<?php

namespace App\Http\Controllers\Salle;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalleController extends Controller
{
    //
    public function afficheAll ()
    {
        $Salles = Salle::all();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun Salle"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Salles = Salle::where('Id',$Id)->get();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ()
    {
        $Id_statut=1;
        $Salles = Salle::where('Id_statut',$Id_statut)->get();
        if($Salles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Salles'=>$Salles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Salles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Id_users_admin" =>"required|string",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Salles'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $SalleExist = Salle::where('Nom', $request->Nom)->first();
            if($SalleExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Salles'=> "cette Salle existe déja"
                ],500) ;
            }
            else{
               
           
                $Salles = Salle::create([
                    "Nom" => strtolower($request->Nom),
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Salles)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Salles'=> "vous venez d'ajouter une Salle"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Salles'=> "une érreur est survenue lors de la creation"
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
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Salles = Salle::find($Id);
            if($Salles){
                $Salles->update([
                    "Nom" => strtolower($request->Nom),
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                return response()->json([
                    'statut'=> 500,
                    'Salles'=> " modification effectuer"
                ],500) ;

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Salles'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
