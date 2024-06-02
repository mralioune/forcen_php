<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MailerMessaging;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function retourtableau ($Users)
    {
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

    public function afficheTout ()
    {
        $Users = User::all();
        return $this->retourtableau($Users);
    }
    public function messagetext()
    {
        $env= MailerMessaging::sendMail("mr.endiaye@gmail.com","endiaye","message","bonjour all");
        return response()->json([
            'statut'=> 404,
            'Users'=>$env
        ],404) ;
        
    }

    public function afficheToutClient ()
    {
        $id_role=1;
        $Users = User::where('id_role',$id_role)->get();
        return $this->retourtableau($Users);
    }
    public function afficheToutAdmin ()
    {
        $id_role=2;
        $Users = User::where('id_role',$id_role)->get();
        return $this->retourtableau($Users);
    }

    public function afficheId ($id)
    {
        $Users = User::where('Id',$id)->get();
        return $this->retourtableau($Users);
    }

    public function afficheMail ($email)
    {
        $Users = User::where('email',$email)->get();
        return $this->retourtableau($Users);
    }
    public function ajouterclient(Request $request)
    {
        return $this->ajouter($request,1);
    }
    public function ajouteradmin(Request $request)
    {
        return $this->ajouter($request,2);
    }
    public function ajouter($request,$id_role)
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
            $userExist = User::where('email', $request->email)->first();
            if($userExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Users'=> "ce mail existe déja"
                ],500) ;
            }
            else{
               
           
                $Users = User::create([
                    "name" => ucfirst($request->name),
                    "lasname"    =>  ucfirst($request->lasname),
                    "email"  =>  strtolower($$request->email),
                    "telephone" => $request->telephone,
                    "password"  => $request->password,
                    "id_statut" => 1,
                    "id_role" => $id_role, 
                    "tokens_mail" =>  User::generateToken(80),
                    "valide_tokens_mail" => 0, 
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
                    "email"  =>  $request->email,
                    "telephone" => $request->telephone,
                    "password"  => $request->password,
                    "id_statut" => 1,
                    "id_role" => 1, 
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
    public function connectionclient(Request $request)
    {
        return $this->connection($request,1);
    }
    public function connectionadmin(Request $request)
    {
        return $this->connection($request,2);
    }
    public function connection($request,$id_role)
    {
        $validation = Validator::make($request->all(),[
            "email" => "required|email|max:255",
            "password" => "required|string|max:255"
        ]);
    
        if ($validation->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validation->messages(),
            ], 422);
        } else {
            // Utilisez Auth pour authentifier l'utilisateur
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'id_role' => $id_role])) {
                // Authentification réussie, récupérez l'utilisateur authentifié
                $user = Auth::user();
                $Roles = Role::where('Id', $user->id)->get();
                // Vous pouvez maintenant retourner les données de l'utilisateur comme vous le souhaitez
                return response()->json([
                    'status' => 200,
                    'user' =>[ $user,$Roles],
                ], 200);
            } else {
                // Authentification échouée
                return response()->json([
                    'status' => 401,
                    'error' => 'Mail ou mot de passe incorrect',
                ], 401);
            }
        }
    }
    

    public function MotDePasseOublier(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "email" =>"required|email|max:255",
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $userExist = User::where('email', $request->email)->first();
            if($userExist)
            {
                return response()->json([
                    'statut'=> 500,
                    'Users'=> "un mail de recupération vous sera envoyera à cette adrress"
                ],500) ;
            }
            else{
                    return response()->json([
                        'statut'=> 500,
                        'Users'=> "un mail de recupération vous sera envoyera à cette adrress"
                        //'Users'=> "un mail de recupération vous a été envoyer"
                    ],500) ;
            
            }
        }
    }

    public function valideToken($tokens_mail)
    {
                # code...generateToken
            $Users = User::where('tokens_mail',$tokens_mail)->first();;
            if($Users){
                $Users->update([
                    "valide_tokens_mail" => 1,
                    "tokens_mail" =>  User::generateToken(80),
                ]);
                if($Users)
                {

                    return response()->json([
                        'statut'=> 200,
                        'Users'=> "votre mail est valider"
                    ],200) ;
                }else {
        
                    return response()->json([
                        'statut'=> 500,
                        'Users'=> "une érreur de validation du mail"
                    ],500) ;
                }
            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Users'=> "une érreur de validation du mail"
                ],500) ;
            }
      
        
    }
  
    public function changepassword(Request $request ,$tokens_mail)
    {
       
        $validation = Validator::make($request->all(),[
            "password" =>"required|string|max:255",
            "passwordConfirme"=>"required|string|max:255"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'errors'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $Users = User::where('tokens_mail',$tokens_mail)->first();;
            if($Users &&( $request->password==$request->passwordConfirme)){
                $Users->update([
                    "password" => $request->password,
                    "tokens_mail" =>  User::generateToken(80)
                ]);

                return response()->json([
                    'statut'=> 500,
                    'Users'=> "opération éffectuer avec succés"
                ],500) ;
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
