@extends('front.master')

@section('title')
    HalalGhor - My Account
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-gray c-blue font-weight-bold">
                        Your Orders
                    </div>
                    @foreach($orders as $order)
                    <div class="shadow rounded bg-dark c-wheat table-responsive mb-5">
                        <table class="table">
                            <thead class="bg-green">
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Order Id</th>
                                <th>Order Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->product_price }}</td>
                                    <td>{{ '1000'.$order->order_id}}</td>
                                    <td>{{$order->shipping->order_status}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <div class="alert alert-gray c-blue font-weight-bold">
                        Contact Info
                    </div>
                    <div class="shadow border-radius-99 border-left border-dark text-center mb-5">
                        <div class="p-5">
                            www.halaghor.com <br>
                            39/3 Shenpara, Parbata <br>
                            Mirpur-10,Dhaka 1216 <br>
                            Bangladesh
                        </div>
                    </div>
                    <div class="shadow border-radius-99 border-right border-dark text-center">
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