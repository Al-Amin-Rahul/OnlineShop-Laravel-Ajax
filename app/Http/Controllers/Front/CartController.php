<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Session;
use App\Product;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product    =   Product::find($request->id);
        if($request->qty <=0){}
        else{

            // price 
            if($product->category_id == 7 && $product->price_25 != 0) //Perfume
            {
                $price  =   $request->perfume_price_cart;
            }
            elseif($product->flash_sale == 1)
            {
                 $price =   $product->price - (($product->price * $product->flash_sale_ratio) / 100);
            }
            elseif($product->occational_offer == 1)
            {
                $price =   $product->price - (($product->price * $product->occational_offer_ratio) / 100);
            }
            elseif($product->daily_offer == 1)
            {
                $price =   $product->price - (($product->price * $product->daily_offer_ratio) / 100);
            }
            elseif($product->mela == 1)
            {
                $price =   $product->price - (($product->price * $product->mela_offer_ratio) / 100);
            }
            else {
                $price =   $product->price;
            }
            
            // end price 

            // weight
            if($product->category_id == 7 && $product->price_25 != 0) //perfume
            {
                if($request->weight == 'price_3'){
                    $weight =   3;
                }
                elseif($request->weight == 'price_6'){
                    $weight =   6;
                }
                elseif($request->weight == 'price_12'){
                    $weight =   12;
                }
                else {
                    $weight =   25;
                }
            }
            elseif($product->category_id == 3) //Women
            {
                $weight =   $request->weight;
            }
            elseif($product->category_id == 4) //Men
            {
                if($request->weight == "S"){
                    $weight =   26;
                }
                elseif($request->weight == "M"){
                    $weight =   27;
                }
                elseif($request->weight == "L"){
                    $weight =   28;
                }
                elseif($request->weight == "XL"){
                    $weight =   29;
                }
                else {
                    $weight =   30;
                }
            }
            else {
                $weight =   0;
            }
            // end weight

            // // gift wrap 
            // if($product->category_id == 7 || $product->category_id == 6) //perfume & Book
            // {
            //     $wrap   =   $request->wrap_val;
            // }
            // else{
            //     $wrap   =   0;
            // }
            // end 

            Cart::add([
                'id' => $product->id, 
                'name' => $product->name, 
                'qty' => $request->qty, 
                'price' => $price, 
                'weight' => $weight, 
                'options' => [
                    'image' => $product->image,
                    // 'wrap'  => $wrap
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
            'viewClass'     =>  "cartaria-width",
            'btnClass'      =>  "cartbtn-width",
        ]);
    }

    public function buyNow(Request $request)
    {
        Cart::destroy();
        $product    =   Product::find($request->id);

        if($product->flash_sale == 1)
        {
             $price =   $product->price - (($product->price * $product->flash_sale_ratio) / 100);
        }
        elseif($product->occational_offer == 1)
        {
            $price =   $product->price - (($product->price * $product->occational_offer_ratio) / 100);
        }
        elseif($product->daily_offer == 1)
        {
            $price =   $product->price - (($product->price * $product->daily_offer_ratio) / 100);
        }
        elseif($product->mela == 1)
        {
            $price =   $product->price - (($product->price * $product->mela_offer_ratio) / 100);
        }
        else {
            $price  =   $product->price;
        }
        
        // weight
        if($product->category_id == 7 && $product->price_25 != 0)
        {
            if($request->weight == 'price_3'){
                $weight =   3;
            }
            elseif($request->weight == 'price_6'){
                $weight =   6;
            }
            elseif($request->weight == 'price_12'){
                $weight =   12;
            }
            else {
                $weight =   25;
            }
            $price  =   $request->perfume_price;
        }
        elseif($product->category_id == 3)
        {
            $weight =   $request->weight;
        } 
        elseif($product->category_id == 4) //Men
        {
            if($request->weight == "S"){
                $weight =   26;
            }
            elseif($request->weight == "M"){
                $weight =   27;
            }
            elseif($request->weight == "L"){
                $weight =   28;
            }
            elseif($request->weight == "XL"){
                $weight =   29;
            }
            else {
                $weight =   30;
            }
        }
        else
        {
            $weight =   0;
        }
        // if($product->category_id == 7 || $product->category_id == 6)
        // {
        //     $wrap   =   $request->wrap;
        // }
        // else{
        //     $wrap   =   0;
        // }
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $request->qty, 
            'price' => $price, 
            'weight' => $weight, 
            'options' => [
                'image' => $product->image,
                // 'wrap'  => $wrap
                ]
            ]);

            $data['cartItems']    =   Cart::content();
            return view('front.checkout.checkout', $data);
        
    }

    public function cartUpdate(Request $request)
    {
        Cart::update($request->row_id, $request->cart_qty);
    }
}
