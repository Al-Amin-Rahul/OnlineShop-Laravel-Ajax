@extends('front.master')

@section('title')
HalalGhor - Checkout
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
<section class="checkout-form pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pb-tb-5">
                <div class="alert bg-dark c-wheat">
                    Your Cart
                </div>
                <div class="table-responsive">
                    <table class="table bg-dark c-wheat shadow rounded">
                        @foreach($cartItems as $cartItem)
                        <tbody>
                            <tr>
                                <td><img src="{{asset( $cartItem->options->image )}}" width="50" alt=""></td>
                                <td>{{ $cartItem->name }} <span class="badge badge-warning">{{ $cartItem->qty }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center bb-yellow">BDT {{ $cartItem->price }} Tk</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shadow rounded table-responsive bg-warning text-dark" id="cartNewTotal">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sub Total</th>
                                        <th id="subTotal">{{ Cart::priceTotal() }}</th>
                                    </tr>
                                    <tr>
                                        <th>Discount - <span id="code"></span></th>
                                        <th id="dis">0</th>
                                    </tr>
                                    <tr>
                                        <th>Gift Wrap</th>
                                        <th id="giftWrapAmount">0</th>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <th id="GrandTotal">{{ Cart::priceTotal() }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="checkbox" name="gift_wrap" id="GiftWrap" value=""> <label for="GiftWrap">Gift Wrap For Tk 20.(Perfume & Book)</label>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-lg-12">
                        <form action="{{route('apply-coupon')}}" method="POST" id="applyCoupon">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control border-green c-green" name="code"
                                    placeholder="Aply Cupon" required>
                                <div class="input-group-append">
                                    <button class="btn bg-green text-white" type="submit"> Apply </button>
                                </div>
                            </div>
                            <div class="px-3 alert-warning" id="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="alert bg-dark c-wheat">
                    Shipping Information
                </div>
                @include('message.message')
                <form action="{{route('checkout.store')}}" class="main" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="example: John" required>
                            </div>
                        </div>
                        <input type="hidden" name="wrap" value="0" id="checkoutWrap">
                        <input type="hidden" name="user_id" value="0" id="userId">
                        <input type="hidden" name="coupon_id" value="0" id="couponId">
                        <input type="hidden" name="new_order_total" value="{{ Cart::pricetotal() }}" id="newOrderTotal">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone" class="font-weight-bold">Mobile</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="example: 017........" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="font-weight-bold">Email (Optional)</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="john@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Address</label>
                        <textarea name="address" id="address" rows="4" class="form-control"
                            placeholder="example: House, Road/Street, City, State" required></textarea>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-rocket"></i> Shipping Methode
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="radio" name="delivery" id="insight" value="50" checked> <label
                                    for="insight">Inside Dhaka Delivery Charge 50Tk</label> </br>
                                <input type="radio" name="delivery" id="outsight" value="100"> <label
                                    for="outsight">Outside Dhaka Delivery Charge 100Tk</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-plane"></i> Payment Methode
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="radio" name="payment" value="1" id="cash" checked> <label for="cash">Cash On
                                    Delivery</label> </br>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="payment" value="2" id="bkash"> <label for="bkash">Bkash</label> </br>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="payment" value="3" id="rocket"> <label for="rocket">Rocket</label> </br>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Place Order" class="form-control  btn btn-dark"
                        width="100%">

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset("/") }}front/js/coupon.js"></script>
<script src="{{ asset("/") }}front/js/wrap.js"></script>
@endsection
