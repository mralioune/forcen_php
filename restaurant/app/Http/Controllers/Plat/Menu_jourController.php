<?php

namespace App\Http\Controllers\Plat;

use App\Http\Controllers\Controller;
use App\Models\Menu_jour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Menu_jourController extends Controller
{
    //
    public function afficheAll ()
    {
        $Menu_jours = Menu_jour::all();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun Menu_jour"
            ],404) ;
        }
    }


    public function afficheId ($Id)
    {
        $Menu_jours = Menu_jour::where('Id',$Id)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    

    public function afficheStatuts ($Id_statut)
    {
        $Menu_jours = Menu_jour::where('Id_statut',$Id_statut)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function affichePlat ($Id_plat)
    {
        $Menu_jours = Menu_jour::where('Id_plat',$Id_plat)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function afficheJour ($Id_jour)
    {
        $Menu_jours = Menu_jour::where('Id_jour',$Id_jour)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

     public function affichePlatStatuts ($Id_plat,$Id_statut)
    {
        $Menu_jours = Menu_jour::where('Id',$Id_plat)->where('Id_statut',$Id_statut)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }
    public function afficheJouStatuts ($Id_jour,$Id_statut)
    {
        $Menu_jours = Menu_jour::where('Id_jour',$Id_jour)->where('Id_statut',$Id_statut)->get();
        if($Menu_jours->count() > 0){

            return response()->json([
                'statut'=> 200,
                'Menu_jours'=>$Menu_jours
            ],200) ;
        }else{

             return response()->json([
                'statut'=> 404,
                'Menu_jours'=>"vous n'avez aucun élément"
            ],404) ;
        }
    }

    public function ajouter(Request $request)
    {
       
        $validation = Validator::make($request->all(),[
            "Id_plat" =>"required|string|max:255",
            "Id_jour" =>"required|string|max:255",
            "Id_statut" =>"required|string|max:255",
            "Id_users_admin" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Menu_jours'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Menu_jourExist = Menu_jour::where('Nom', $request->Nom)->get();
            if($Menu_jourExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Menu_jours'=> "cette Menu du jour existe déja"
                ],500) ;
            }
            else{
               
           
                $Menu_jours = Menu_jour::create([
                    "Id_plat" => $request->Id_plat,
                    "Id_jour" => $request->Id_jour,
                    "Id_statut" => $request->Id_statut,
                    "Id_users_admin" => $request->Id_users_admin,
                    "Id_statut" => 1,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

                if($Menu_jours)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Menu_jours'=> "vous venez d'ajouter une Menu du jour"
                    ],200) ;
                }else{
        
                    return response()->json([
                        'statut'=> 500,
                        'Menu_jours'=> "une érreur est survenue lors de la creation"
                    ],500) ;
                }
            }

        }
        
    }

    public function modifier(Request $request ,int $Id)
    {
       
        $validation = Validator::make($request->all(),[
            "Id_plat" =>"required|string|max:255",
            "Id_jour" =>"required|string|max:555",
            "Id_statut" =>"required|string|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Menu_jours'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Menu_jours = Menu_jour::find($Id);
            if($Menu_jours){
                $Menu_jours->update([
                    "Id_plat" => $request->Nom,
                    "Id_jour" => $request->Description,
                    "Id_statut" => $request->Id_statut,
                    "Date_save" =>  date("Y-m-d H:i:s")
                ]);

            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Menu_jours'=> "une érreur est survenue, vous ne pouvez pas faire une modification "
                ],500) ;
            }
        }
        
    }
}
