<?php

namespace App\Http\Controllers\Salle;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    //
    public function afficheAll ()
    {
        $Tables = Table::all();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun Table"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Tables = Table::where('Id',$Id)->get();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ()
    {
        $Id_statut=1;
        $Tables = Table::where('Id_statut',$Id_statut)->get();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheTableSalle ($Id_salle)
    {
        $Tables = Table::where('Id_salle',$Id_salle)->get();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
    public function afficheSalleStatut ($Id_salle,$Id_statut)
    {
        $Tables = Table::where('Id_salle',$Id_salle)->where('Id_statut',$Id_statut)->get();
        if($Tables->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Tables'=>$Tables
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Tables'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Nom" =>"required|string|max:255",
            "Id_salle" =>"required|string",
            "Id_users_admin" =>"required|string",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Tables'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $TableExist = Table::where('Nom', $request->Nom)->where('Id_salle', $request->Id_salle)->first();
            if($TableExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Tables'=> "cette Table existe déja"
                ],500) ;
            }
            else{
               
           
                $Tables = Table::create([
                    "Nom" => strtolower($request->Nom),
                    "Id_salle" => $request->Id_salle,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Tables)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Tables'=> "vous venez d'ajouter une Tables"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Tables'=> "une érreur est survenue lors de la creation"
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
            $Users = Table::find($Id);
            if($Users){
                $Users->update([
                    "Nom" => strtolower($request->Nom),
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Users'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
