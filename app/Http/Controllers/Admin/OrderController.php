<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Shipping;
use App\OrderDetail;
use App\Product;
use App\Coupon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shippings']  =   Shipping::orderBy('id', 'desc')->get();
        return view('admin.order.manage-order', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping     =   Shipping::find($id);
        $orderDetails =   OrderDetail::where('order_id', $id)->get();
        return view('admin.order.view-order-details', [
            'shipping'      => $shipping,
            'orderDetails'  => $orderDetails
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $validator = Validator::make($request->all(), [
            "order_status" => "required"
        ]);

        $shipping = Shipping::find($id);

        $shipping->update([
            "order_status" => $request->order_status

        ]);

        return redirect()->route("admin.order.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping    =   Shipping::find($id);
        $shipping->delete($id);
        return redirect()->back()->with('message', 'Deleted Successfully !');
    }
}
