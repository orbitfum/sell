<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart, Session;

class Order extends Model
{
    static public function addToCart($request)
    {

            $product = $request->toArray();

            if(Cart::add($product['id'], $product['title'], $product['price'], $product['quntity'],
                [   'img' => $product['img'],
                    'shipping' => $product['ship'],
                    'val1' => $product['val1'],
                    'val2' => !empty($product['val2'])? $product['val2'] : '',
                    'val3' => !empty($product['val3'])? $product['val3'] : '',
                    'val3' => !empty($product['val4'])? $product['val4'] : '',

                    ])){
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

    static public function removeItem($id){
        Cart::remove($id);
        Session::flash('success', 'פריט נמחק בהצלחה');
    }

    static public function updateItem($request){
        Cart::update($request['id'], ['quantity' => ['relative' => false, 'value' => $request['quantity']]]);
        echo $request['id'];
        Session::flash('success', 'עגלה עודכנה בהצלחה');
    }
}
