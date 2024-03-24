<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function afficheTout ()
    {
        $Users = User::all();
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

    public function afficheId ($id)
    {
        $Users = User::find($id);
        if($Users->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Users'=>$Users
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Users'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheMail ($email)
    {
        $Users = User::find($email);
        if($Users->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Users'=>$Users
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Users'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "name" =>"required|string|max:255",
            "lasname" =>"required|string|max:255",
            "email" =>"required|email|max:255",
            "telephone"=>"required|string|max:255",
            "password"=>"required|string|max:255"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = User::create([
                "name" => $request->name,
                "lasname"    =>  $request->lasname,
                "email"  =>  $request->telephone,
                "telephone" => $request->telephone,
                "password"  => sha1($request->password),
                "Id_statut" => 1,
                "Id_role" => 1, 
            ]);

            if($Users)
            {

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

    public function modifier(Request $request ,int $id)
    {
       
        $validation = Validator::make($request->all(),[
            "name" =>"required|string|max:255",
            "lasname" =>"required|string|max:255",
            "email" =>"required|email|max:255",
            "telephone"=>"required|string|max:255",
            "password"=>"required|string|max:255"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = User::find($id);
            if($Users){
                $Users->update([
                    "name" => $request->name,
                    "lasname"    =>  $request->lasname,
                    "email"  =>  $request->telephone,
                    "telephone" => $request->telephone,
                    "password"  => sha1($request->password),
                    "Id_statut" => 1,
                    "Id_role" => 1, 
                ]);

                if($Users)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Users'=> "vous utilisateur à été créer et vous venez de recevoir un mail de validation."
                    ],200) ;
                }else {
        
                    return response()->json([
                        'statut'=> 500,
                        'Users'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
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
