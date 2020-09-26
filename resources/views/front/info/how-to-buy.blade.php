@extends('front.master')

@section('title')
    HalalGhor - How To Buy
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section>
        <div class="container pt-5 pb-5">
            <div class="alert alert-gray c-blue font-weight-bold">
                How To Buy
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="alert alert-warning text-justify"><i class="fas fa-lightbulb"></i> Tips : লগিন করে অর্ডার করুন। তাহলে অরডারটি Track করতে পারবেন</span>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center">
                    <span><br><br><span class="text-success font-weight-bold">কিভাবে অর্ডার করবেন -</span> <br><br>
                    <span class="badge badge-dark">১</span> প্রথমে আপনার পছন্দের প্রডাক্ট এ ক্লিক করুন।<br><br>
                    <span class="badge badge-dark">২</span> প্রডাক্ট এর সাইজ অথবা মিলি সিলেক্ট করুন <span class="text-danger">(যদি থাকে)</span> ।<br><br>
                    <span class="badge badge-dark">৩ </span> সরাসরি কিনতে চাইলে Buy Now এ ক্লিক করুন অথবা Add To Cart এ ক্লিক করে কার্ট থেকে Checkout এ ক্লিক করুন।<br><br>
                    <span class="badge badge-dark">৪</span> শিপিং এর সঠিক তথ্যাদি দিয়ে Place Order এ ক্লিক করুন।<br><br>
                    <span class="badge badge-dark">৫</span> সর্বশেষ আপডেট পেতে আপনার অর্ডার আইডি (Order Id) টি সংরক্ষণ করে রাখুন।</span>
                </div>
            </div>
        </div>
    </section>
@endsection