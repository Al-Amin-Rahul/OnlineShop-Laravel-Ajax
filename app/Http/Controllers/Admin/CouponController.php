<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coupons']    =   Coupon::all();
        return view('admin.coupon.manage-coupon', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon =   new Coupon();
        $validator = Validator::make($request->all(), [
            "coupon_code"       => "required|unique:coupons,coupon_code",
            "discount"          => "required",
            "expire_date"       => "required",
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $coupon->coupon_code    =   $request->coupon_code;
        $coupon->discount    =   $request->discount;
        $coupon->expire_date    =   $request->expire_date;
        $coupon->save();
        return redirect()->back()->with('message', 'Coupon Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $coupon = Coupon::find($id);

        $coupon->delete($id);
        return redirect()->back()->with('message', 'Coupon Deleted Successfully !');
    }
}
