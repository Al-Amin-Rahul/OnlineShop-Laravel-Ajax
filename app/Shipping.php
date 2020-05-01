<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function insertShipping($shipping, $request)
    {
        $shipping->name         =   $request->name;
        $shipping->phone        =   $request->phone;
        $shipping->address      =   $request->address;
        $shipping->delivery     =   $request->delivery;
        $shipping->status       =   "Pending";
        $shipping->save();

        return;
    }
}
