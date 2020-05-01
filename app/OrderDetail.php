<?php

namespace App;

use Cart;
use Illuminate\Database\Eloquent\Model;
use Session;

class OrderDetail extends Model
{
    public function insertOrderDetail($cartItems, $shipping)
    {
        foreach($cartItems as $cartItem)
        {
            $orderDetail   =   new OrderDetail();
            $orderDetail->order_id          =   $shipping->id;
            $orderDetail->product_id        =   $cartItem->id;
            $orderDetail->product_name      =   $cartItem->name;
            $orderDetail->product_price     =   $cartItem->price;
            $orderDetail->product_qty       =   $cartItem->qty;
            $orderDetail->order_total       =   Session::get('totalPrice');
            $orderDetail->save();
        }
    }
}
