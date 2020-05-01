<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Shipping;
use App\OrderDetail;
use Cart;
use Session;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cartItems']    =   Cart::content();
        return view('front.checkout.checkout', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "sy";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     =>   'required|max:50',
            'phone'    =>   'required|max:20',
            'address'  =>   'required'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $shipping = new Shipping();  
            $shipping->insertShipping($shipping, $request);

            $cartItems     =   Cart::content();
            $orderDetail   =   new OrderDetail();
            $orderDetail->insertOrderDetail($cartItems, $shipping);
            Cart::destroy();

            Session::put('customer_name', $request->name);
            Session::put('phone', $request->phone);
            Session::put('order_id', "#000".$shipping->id);

            return redirect()->route("order-confirmation");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return "show";   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


