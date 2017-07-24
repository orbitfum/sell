<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart, Session;

class Order extends Model
{
    static public function addToCart($request)
    {

            $product = $request->toArray();

            if(Cart::add($product['id'], $product['title'], $product['price'], 1, ['img' => $product['img']])){
                print_r($product) ;
            }else{
                echo 0;
            }


    }

    static public function cartView(&$data){

        $data['cart'] = [];
        if($cart = Cart::getContent()->toArray()){

            sort($cart);

            $data['cart'] = $cart;


        }
    }
}
