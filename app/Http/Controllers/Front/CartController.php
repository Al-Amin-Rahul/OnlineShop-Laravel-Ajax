<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product    =   Product::find($request->id);
        if($request->qty <=0)
        {
            
        }
        else{
            
            Cart::add([
                'id' => $product->id, 
                'name' => $product->name, 
                'qty' => $request->qty, 
                'price' => $product->price, 
                'weight' => 550, 
                'options' => [
                    'image' => $product->image
                    ]
                ]);
        }
    }

    function remove(Request $request)
    {
        Cart::remove($request->id);
    }

    public function cartShow()
    {
        $cartItems      =   Cart::content();
        $count          =   Cart::count();
        $totalPrice     =   Cart::priceTotal();


        return view('front.cart.show-cart', [
            'cartItems'     =>  $cartItems,
            'count'         =>  $count,
            'totalPrice'    =>  $totalPrice,
            'viewClass'     =>  "w-40",
            'btnClass'      =>  "40%",
        ]);
    }

    public function buyNow(Request $request)
    {
        Cart::destroy();
        $product    =   Product::find($request->id);

        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $request->qty, 
            'price' => $product->price, 
            'weight' => 550, 
            'options' => [
                'image' => $product->image
                ]
            ]);

        $data['cartItems']    =   Cart::content();
        return view('front.checkout.checkout', $data);
    }
}
