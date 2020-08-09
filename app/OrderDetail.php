<?php

namespace App;

use Cart;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Shipping;

class OrderDetail extends Model
{
    public function insertOrderDetail($cartItems, $shipping , $request)
    {
        foreach($cartItems as $cartItem)
        {

            $orderDetail   =   new OrderDetail();
            $orderDetail->order_id          =   $shipping->id;
            $orderDetail->product_id        =   $cartItem->id;
            $orderDetail->product_name      =   $cartItem->name;
            $orderDetail->product_price     =   $cartItem->price;
            $orderDetail->product_qty       =   $cartItem->qty;
            $orderDetail->product_weight    =   $cartItem->weight;
            $orderDetail->dis_code          =   $request->coupon_id;
            $orderDetail->product_wrap      =   $request->wrap;
            $orderDetail->order_total       =   $request->new_order_total ?? Session::get('totalPrice');
            $orderDetail->customer_id       =   Session::get('customer_id');
            $orderDetail->save();
        }
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'order_id', 'id');
    }
}
