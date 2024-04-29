<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //
    public function afficheAll ()
    {
        $Roles = Role::all();
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun role"
            ],404) ;
        }
    }


    public function afficheId ($id)
    {  
        $Roles = Role::where('id',$id)->get();
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheStatuts ($Id_statut)
    {
        $Roles = Role::where('Id_statut',$Id_statut)->get();
        if($Roles->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Roles'=>$Roles
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Roles'=>"vous n'avez aucun élément"
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
                'Roles'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $rolesExist = Role::where('Nom', $request->Nom)->get();
            if($rolesExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Roles'=> "ce role existe déja"
                ],500) ;
            }
            else{
               
           
                $Roles = Role::create([
                    "Nom" => $request->Nom,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Roles)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Roles'=> "vous venez d'ajouter un nouveau role"
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
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = Role::find($Id);
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
                    'Users'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }

}
