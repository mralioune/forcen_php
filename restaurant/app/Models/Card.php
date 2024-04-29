<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card 
{
   
    static function addToCart($product)
    {
        $cart = Card::getCartFromCookie() ?: [];
        $existingProduct = array_filter($cart, function ($p) use ($product) {
            return $p['Id'] === $product['Id'];
        });

        if (!empty($existingProduct)) {
            $existingProductKey = key($existingProduct);     
             $cart[$existingProductKey]['Quantite'] = $product['Quantite'];
          
        } else {
            $cart[] = $product;
        }
      
        Card::setCartToCookie($cart);
    }

    static  function removeProductFromCart($productId)
    {
        $cart = Card::getCartFromCookie() ?: [];
        $index = array_search($productId, array_column($cart, 'Id'));

        if ($index !== false) {
            array_splice($cart, $index, 1);
            Card::setCartToCookie($cart);
          
        }
    }

    static  function displayCart()
    {
        $cart = Card::getCartFromCookie() ?: [];
        return response()->json($cart);
      
    }

    static function showCart()
    {
        $cart = Card::getCartFromCookie() ?: [];
        return $cart;
    }
    static  function nombreCart()
    {
        $cart = Card::getCartFromCookie() ?: [];
        
        return sizeof($cart);
    }

    static function updateProductQuantity($productId, $quantity)
    {
        $cart = Card::getCartFromCookie() ?: [];
        $existingProduct = array_filter($cart, function ($p) use ($productId) {
            return $p['Id'] === $productId;
        });

        if (!empty($existingProduct)) {
            $existingProduct = current($existingProduct);
            $existingProduct['Quantite'] = (int) $quantity;
            Card::setCartToCookie($cart);
           // $this->displayCart();
        }
    }

    static function getCartFromCookie()
    {
        $cart = null;
        foreach ($_COOKIE as $name => $value) {
            if ($name === 'cart') {
                $cart = json_decode($value, true);
                break;
            }
        }
        return $cart;
    }

    function setCartToCookie($cart)
    {
        setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60);
    }
    function viderCartToCookie()
    { 
        setcookie('cart');
        unset($_COOKIE['cart']);
    }
}
