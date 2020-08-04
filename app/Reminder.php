<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public function saveReminder($request, $product)
    {
        $reminder = new Reminder();
        
        $reminder->product_id           = $product->id;
        $reminder->product_name         = $product->name;
        $reminder->customer_name        = $request->customer_name;
        $reminder->customer_phone       = $request->customer_phone;
        $reminder->save();
        return;
    }
}
