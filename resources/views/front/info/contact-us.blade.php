@extends('front.master')

@section('title')
    HalalGhor - Contact Us
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section>
        <div class="container pt-5 pb-5">
            <div class="alert alert-gray c-blue font-weight-bold">
                Contact Us
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <span class="text-justify">We would like to receive your feedback about our site and any question or comment. Keep in contact wth us and feel free to express any opinion, viewpoint, suggestion or comment that you might have. Corporate Office <br><br>Working Hour: 09.00 AM to 10.00 PM</span>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-6 pb-tb-5 pb-xs-5">
                    <div class="shadow bg-white border-radius-99 border-left border-dark text-center">
                        <div class="p-5">
                            www.halaghor.com <br>
                            39/3 Shenpara, Parbata <br>
                            Mirpur-10,Dhaka 1216 <br>
                            Bangladesh
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pb-tb-5 pb-xs-5">
                    <div class="shadow bg-white border-radius-99 border-right border-dark text-center">
                        <div class="p-5">
                            <i class="fas fa-mobile"></i> +8801947325581  <br>
                            <i class="fas fa-envelope"></i> halalghor@gmail.com <br>
                            <i class="fas fa-globe"></i> www.halaghor.com <br>
                            <i class="fab fa-facebook"></i> facebook.com/halalghor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection