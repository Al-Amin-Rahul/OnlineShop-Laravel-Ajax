@extends('front.master')

@section('title')
    HalalGhor - Track Order
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section class="thank-you pt-5 pb-5">
        <div class="container">
        @if($order == NULL)
            <div class="alert alert-danger text-center">
                OOPS !!! You May Enterd Wrong Order Id... Check Again <i class="fas fa-smile"></i>
            </div>
            <div class="row pt-3">
                <div class="col-lg-12 text-center">
                    <a href="/" class="back-home"><i class="fas fa-arrow-left"></i> Back To Home</a>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert bg-success c-wheat text-center">
                        Your Order Details !
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="shadow rounded bg-dark c-wheat table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Order Id</th>
                                    <th>{{ '1000'.$order->id }}</th>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <th>{{ $order->order_status }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <a href="/" class="back-home"><i class="fas fa-arrow-left"></i> Back To Home</a>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection