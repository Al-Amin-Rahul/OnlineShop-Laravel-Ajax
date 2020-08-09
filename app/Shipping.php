<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;

class Shipping extends Model
{
    protected $fillable =   [
        'status', 'order_status'
    ];
    public function insertShipping($shipping, $request)
    {
        $shipping->name         =   $request->name;
        $shipping->phone        =   $request->phone;
        $shipping->email        =   $request->email;
        $shipping->address      =   $request->address;
        $shipping->delivery     =   $request->delivery;
        $shipping->payment_status     =   $request->payment;
        $shipping->status       =   "Pending";
        $shipping->order_status =   "Pending";
        $shipping->save();

        return;
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
