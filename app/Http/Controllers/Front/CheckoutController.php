<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Shipping;
use App\OrderDetail;
use App\Coupon;
use App\UsedCoupon;
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
            'address'  =>   'required',
            'delivery' =>   'required',
            'payment'  =>   'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            //coupon
            if($request->coupon_id != 0)
            {
                $usedAdd    =   UsedCoupon::insert([
                    'coupon_id' =>   $request->coupon_id,
                    'user_id'   =>   $request->user_id
                ]);
            }

            //sippin
            $shipping = new Shipping();  
            $shipping->insertShipping($shipping, $request);

            //orderDeails
            $cartItems     =   Cart::content();
            $orderDetail   =   new OrderDetail();
            $orderDetail->insertOrderDetail($cartItems, $shipping, $request);
            Cart::destroy();

            Session::put('shipping_name', $request->name);
            Session::put('phone', $request->phone);
            Session::put('order_id', '1000'.$shipping->id);

            return redirect()->route("order-confirmation");
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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

    public function applyCoupon(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $date   =   new Carbon;
            $code   =   $request->code;
            $check  =   Coupon::where("coupon_code", $request->code)->where("expire_date", ">", $date)->get();
            if(count($check) == "1")
            {
                $userId     =   Session::get('customer_id');
                $checkUsed  =   UsedCoupon::where('user_id', $userId)->where('coupon_id',$check[0]->id)->count();
                
                if($checkUsed=="0")
                {
                    $dis        =   $check[0]->discount;
                    $newTotal   =   number_format((Cart::priceTotal() - ((Cart::priceTotal() * $check[0]->discount) / 100)), 2);
                    
                    return ([
                        'alert'      =>  'Applied',
                        'code'       =>  $code,
                        'dis'        =>  $check[0]->discount,  
                        'newTotal'   =>  $newTotal,  
                        'coupon_id'  =>  $check[0]->id,
                        'user_id'    =>  $userId
                    ]);
                }
                else
                {
                    return([
                        'dis'        =>  0,  
                        'code'       =>  '',
                        'newTotal'   =>  Cart::pricetotal(),  
                        'alert'     =>  "You Already Used This Coupon"
                    ]);
                }

            }
            else
            {
                return([
                    'dis'        =>  0,  
                    'code'       =>  '',
                    'newTotal'   =>  Cart::pricetotal(),  
                    'alert'     =>  "Sorry The Coupon Is Not Valid"
                ]);
            }
        }
        else
        {
            return([
                'dis'        =>  0,  
                'newTotal'   =>  Cart::pricetotal(),  
                'alert'     =>  "You Have To Login First !"
            ]);
        }
    }
}


