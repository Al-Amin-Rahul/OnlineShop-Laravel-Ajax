<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\OrderDetail;
use App\Reminder;
use App\CustomerFeedback;
use App\Product;
use Illuminate\Http\Request;
use Session;


class InfoController extends Controller
{
    public function about(){
        return view("front.info.about-us");
    }
    public function contact(){
        return view("front.info.contact-us");
    }
    public function howToBuy(){
        return view("front.info.how-to-buy");
    }
    public function securityPolicy(){
        return view("front.info.security-policy");
    }
    public function shippingAndReplacement(){
        return view("front.info.shipping-and-replacement");
    }
    public function privacyPolicy(){
        return view("front.info.privacy-policy");
    }
    public function termsOfUse(){
        return view("front.info.terms-of-use");
    }
    public function MyAccount(){
        $id   = Session::get('customer_id');
        if($id)
        {
            $data['orders'] =   OrderDetail::with('shipping')->where('customer_id', $id)->get();
            return view("front.info.my-account", $data);
        }
        else{
            return redirect()->route('login');
        }
    }
    public function developerInfo(){
        return view("front.developer-info.developer-info");
    }
    public function reminder($id)
    {
        $data['id'] =   $id;
        return view("front.info.reminder", $data);
    }
    public function saveReminder(Request $request)
    {
        $product    =   Product::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'customer_name'     =>   'required',
            'customer_phone'    =>   'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reminder = new Reminder();  
        $reminder->saveReminder($request, $product);
        return redirect()->back()->with('message', 'Reminder Set Successful');
    }

    public function feedback()
    {
        return view("front.info.feedback");
    }

    public function saveFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          =>   'required',
            'work'          =>   'required',
            'feedback'      =>   'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $feedback = new CustomerFeedback();  
        $feedback->saveFeedback($request);
        return redirect()->back()->with('message', 'Feedback Added Successful');
    }
}
