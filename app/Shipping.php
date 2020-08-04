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
        $shipping->address      =   $request->address;
        $shipping->delivery     =   $request->delivery;
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
