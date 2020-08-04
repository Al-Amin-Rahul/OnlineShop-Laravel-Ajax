<!-- show cart -->
<a id="showCartOpenBtn">
    <!-- <section class="cart-view bg-pink shadow rounded" id="main" style="margin-right:{{ $btnClass }}"> -->
    <section class="cart-view bg-pink shadow rounded" id="main">
        <div class="icon text-center">
        <span><i class="fas fa-shopping-bag fa-2x text-dark"></i></span> <br>
            <!-- <span><img src="{{ asset("/") }}front/images/bag32.png" alt=""></span>
            <hr class="bg-blue"> -->
            <span class="badge badge-warning">{{ Cart::count() }} Items</span>
        </div>
    </section>
</a>
<!-- cart area hidden -->
<!-- <div id="cartArea" class="cartbar {{ $viewClass }}"> -->
<div id="cartArea" class="cartbar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="container-fluid">
        @if(Cart::count() != 0)
        <div class="row">
            <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table bg-pink c-wheat shadow rounded text-center" width="100%">
                            <thead>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                @if(Route::currentRouteName() === 'checkout.index' || Route::currentRouteName() === 'buy-now')
                                @else
                                    <th>Action</th>
                                @endif
                            </thead>
                            @php($sum=0)
                            @foreach($cartItems as $cartItem)
                            <tbody>
                                <td>{{ $cartItem->name }}/ {{ $cartItem->options->wrap }}/ {{ $cartItem->weight }}</td>
                                <td><img src="{{asset( $cartItem->options->image )}}" width="50" alt=""></td>
                                <td>
                                    <form action="{{ route("cart-update") }}" method="POST" id="updateCart">
                                        @csrf
                                        <input type="number" name="cart_qty" value="{{ $cartItem->qty }}" id="" style="width:80px;">
                                        <input type="hidden" name="row_id" value="{{ $cartItem->rowId }}">
                                        <input type="submit" value="Update" name="cart_update" class="form-control btn btn-dark" style="width:80px;">
                                    </form>
                                </td>
                                <td>{{ $cartItem->price }}</td>
                                <td>{{ $total   =   $cartItem->qty * $cartItem->price }}</td>
                                @if(Route::currentRouteName() === 'checkout.index' || Route::currentRouteName() === 'buy-now')
                                @else
                                    <td>
                                        <form action="{{url("remove-cart")}}" method="post" id="removeForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cartItem->rowId }}">
                                            <button class="btn-circle btn-default" type="submit" onclick="return confirm('Are your sure')"><span class="fas fa-times"></span></button>
                                        </form>
                                    </td>
                                @endif
                            </tbody>
                            @php($sum = $sum+$total)
                            @endforeach
                            {{ Session::put('totalPrice', $sum) }}
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row pt-3">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <div class="shadow rounded table-responsive">
                        <table class="table bg-pink">
                            <thead>
                                <th class="">Total</th>
                                <th class="">{{ Cart::priceTotal() }}</th>
                            </thead>
                            <tbody>
                                <tr><td colspan="2" class="text-center">
                                    @if(Session::get('customer_id'))
                                        <a href="{{route('checkout.index')}}" class="btn btn-deepblue">Checkout <i class="fas fa-arrow-right"></i></a>
                                    @else
                                        <a href="{{route('login') . '?=' . 'checkout'}}" class="btn btn-deepblue">Checkout <i class="fas fa-arrow-right"></i></a>
                                    @endif
                                </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger">
            Cart is Empty ! Add Some Products First
        </div>
        @endif
    </div>

    <script>
        var showCartOpenBtn     =   $('#showCartOpenBtn');
        var cart     =   $('#cartArea');

        showCartOpenBtn.on('click', function(e) {
            e.preventDefault();
            if($(window).width() <= 425)
            {
                document.getElementById("cartArea").style.width = "100%";
                document.getElementById("main").style.marginRight = "100%";
            }
            else if($(window).width() <= 768)
            {
                document.getElementById("cartArea").style.width = "70%";
                document.getElementById("main").style.marginRight = "70%";
            }
            else
            {
                document.getElementById("cartArea").style.width = "50%";
                document.getElementById("main").style.marginRight = "50%";
            }
        });     
        function closeNav() {
            document.getElementById("cartArea").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            // cart.removeClass('w-40');
        }
    </script>