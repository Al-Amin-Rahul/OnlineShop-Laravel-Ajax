<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    public function insertCustomer($request)
    {
        $customer = new Customer;
        
        $customer->customer_name        = $request->customer_name;
        $customer->customer_phone       = $request->customer_phone;
        $customer->customer_address     = $request->customer_address;
        $customer->customer_password    = bcrypt($request->customer_password);
        $customer->save();

        Session::put("customer_id", $customer->id);
        Session::put("customer_name", $customer->customer_name);
        return;
    }
}
