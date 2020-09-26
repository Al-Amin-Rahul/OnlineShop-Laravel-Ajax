@extends('front.master')

@section('title')
    HalalGhor - Privacy Policy
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section>
        <div class="container pt-5 pb-5">
            <div class="alert alert-gray c-blue font-weight-bold">
                Privacy Policy
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <span class="text-justify">
                        This privacy policy sets out how halalghor uses and protects any information that you give here when you use this website. We view protection of your privacy as a very important principle. We are committed to ensuring your privacy here. Your information will only be used in accordance with this privacy statement whenever we ask you to provide any information by which you can be identified while using this website.
                        <br><br>
                        halalghor will not use your personal information to initiate any promotional phone call or SMS. We store and process your information in computers that are protected by physical as well as reasonable technological security measures.
                        <br><br>
                        halalghor may change this privacy policy from time to time if needed by updating this page. Please check this page periodically to ensure that you are happy with our privacy policy.
                    </span>
                </div>
            </div>
        </div>
    </section>
@endsection