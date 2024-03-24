<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users_client;
use Illuminate\Support\Facades\Validator;

class Users_clientController extends Controller
{
    //
    public function index ()
    {
        $Users = Users_client::all();
        if($Users->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Users'=>$Users
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Users'=>"vous n'avez aucun utilisateurs"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Prenom" =>"required|string|max:255",
            "Nom" =>"required|string|max:255",
            "Email" =>"required|email|max:255",
            "Telephone"=>"required|string|max:255",
            "Password"=>"required|string|max:255"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'errors'=>$validation->messages(),
                'envoi'=>$request->all()
            ],422) ;
        }else {
            # code...generateToken
            $Users = Users_client::create([
                "Prenom" => $request->Prenom,
                "Nom"    =>  $request->Nom,
                "Email"  =>  $request->Email,
                "Telephone" => $request->Telephone,
                "Password"  => sha1($request->Password),
                "Tokens_mail" => Users_client::generateToken(80),
                "Valide_tokens_mail" => 0,
                "Id_statut" => 1,
                "Id_role" => 1, 
                "Date_inscription" =>  date("Y-m-d H:i:s")
            ]);

            if($Users){

                return response()->json([
                    'statut'=> 200,
                    'Users'=> "vous utilisateur à été créer et vous venez de recevoir un mail de validation."
                ],200) ;
            }else{
    
                 return response()->json([
                    'statut'=> 500,
                    'Users'=> "une érreur est survenue lors de la creation"
                ],500) ;
           }
        }

    }
}
