<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    public function saveCustomer( Request $request)
    {
        $validator = Validator::make($request->all(), [
            "customer_name"         => "required",
            "customer_phone"        => "required",
            "customer_address"      => "required",
            "customer_password"     => "required"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $customer = new Customer();
            $customer->insertCustomer($request);
            $prevUrl     =   url()->previous();
            
            if(Str::contains($request->url, 'buy-now'))
            {
                return redirect('checkout');
            }
            elseif($request->url)
            {
                return redirect($request->url);
            }
            else
            {
                return redirect()->route('/');
            }
        }
    }

    public function customerLogout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function guestLogin(Request $request)
    {
        $prevUrl     =   url()->previous();
        Session::put("customer_id", octdec(uniqid()));
        Session::put("customer_name", 'Guest_' . octdec(uniqid()));

        if(Str::contains($request->url, 'buy-now'))
        {
            return redirect('checkout');
        }
        elseif($request->url)
        {
            return redirect($request->url);
        }
        else
        {
            return redirect()->route('/');
        }
    }
    public function customerLogin(Request $request)
    {
        $customer   =   Customer::where('customer_phone', $request->customer_phone)->first();
        if($customer)
        {
            if(password_verify($request->customer_password, $customer->customer_password))
            {
                $prevUrl     =   url()->previous();
                Session::put("customer_id", $customer->id);
                Session::put("customer_name", $customer->customer_name);

                if(Str::contains($request->url, 'buy-now'))
                {
                    return redirect('checkout');
                }
                elseif($request->url)
                {
                    return redirect($request->url);
                }
                else
                {
                    return redirect()->route('/');
                }
            }
            else
            {
                return redirect('login')->with('message', 'Invalid Password');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Invalid Phone Number');
        }
    }
}
