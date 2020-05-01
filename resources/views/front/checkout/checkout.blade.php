@extends('front.master')

@section('body')
    <section class="checkout-form pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="table-responsive">
                        <table class="table bg-dark c-wheat shadow rounded">
                                @foreach($cartItems as $cartItem)
                                <tbody>
                                    <tr>
                                        <td><img src="{{asset( $cartItem->options->image )}}" width="50" alt=""></td>
                                        <td>{{ $cartItem->name }} <span class="badge badge-warning">{{ $cartItem->qty }}</span></td>
                                    </tr>
                                    <tr><td colspan="2" class="text-center bb-yellow">BDT {{ $cartItem->price }} Tk</td></tr>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow rounded table-responsive bg-warning text-dark">
                                <table class="table">
                                    <thead>
                                        <tr><th>Total</th><th>{{ Cart::priceTotal() }}</th></tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="alert bg-dark c-wheat">
                        Fill The Information Carefully
                    </div>
                    @include('message.message')
                    <form action="{{route('checkout.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="example: John">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Mobile</label>
                                    <input type="number" name="phone" class="form-control" id="phone" placeholder="example: 017........">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="4" class="form-control" placeholder="example: House, Road/Street, City, State"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="delivery" id="insight" value="50" checked> <label for="insight">Insight Dhaka Delivery Charge 50Tk</label> </br>
                            <input type="radio" name="delivery" id="outsight" value="100"> <label for="outsight">Outsight Dhaka Delivery Charge 100Tk</label>
                        </div>
                        
                        <input type="submit" name="submit" value="Place Order" class="form-control  btn btn-success" width="100%">
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection