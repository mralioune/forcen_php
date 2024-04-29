<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    //

    function addToCart(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "Id" =>"required|string|max:255",
            "Quantite" =>"required|string|"
        ]);
        if ($validation->fails()) {
            # code...
            return response()->json([
                'statut'=> 422,
                'Quantites'=>$validation->messages(),
            ],422) ;
        }else {
            # code...generateToken
            $userExist = Plat::where('Id', $request->Id)->get();
            if($userExist)
            {
                $product= ["Id"=>$request->Id,"Quantite"=> $request->Quantite];
               $add= Card::addToCart($product);
                return response()->json([
                    'statut'=> 500,
                    'Jours'=> "ce Plat à été ajouter sur votre panier"
                ],500) ;
            
            }
            else{
                return response()->json([
                    'statut'=> 500,
                    'Jours'=> "ce Plat n' existe pas"
                ],500) ;
            }

        } 
       
    }

    function removeProductFromCart($productId)
    {
        $cart = Card::removeProductFromCart($productId);
       
    }

    function displayCart()
    {
        $cart = Card::displayCart();
      
    }

  
}
