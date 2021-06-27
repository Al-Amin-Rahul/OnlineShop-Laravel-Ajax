<!-- show cart -->
<a id="showCartOpenBtn">
    <section class="cart-view bg-white shadow rounded {{ $btnClass }}" id="main">
        <div class="icon text-center  p-3">
        <span><i class="fas fa-shopping-cart fa-2x c-green"></i></span>
        </div>
        <div class="bg-green text-center text-dark font-weight-bold">{{ Cart::count() }} Items</div>
    </section>
</a>
<!-- cart area hidden -->
<div id="cartArea" class="cartbar {{ $viewClass }}">
<!-- <div id="cartArea" class="cartbar"> -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="container-fluid">
        @if(Cart::count() != 0)
        <div class="row">
            <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table bg-white shadow rounded" width="100%">
                            @php($sum=0)
                            @foreach($cartItems as $cartItem)
                            <tbody class="shadow">
                                <td class="pr-0">{{ $cartItem->name }}</td>
                                <td class="pl-0"><img src="{{asset( $cartItem->options->image )}}" width="50" alt=""></td>
                                <td class="px-0">
                                    <form action="{{ route("cart-update") }}" method="POST" id="updateCart">
                                        @csrf
                                        <input type="number" name="cart_qty" value="{{ $cartItem->qty }}" class="mr-1 w-25">
                                        <input type="hidden" name="row_id" value="{{ $cartItem->rowId }}">
                                        <input type="submit" value="Update" name="cart_update" class="btn btn-dark small p-1">
                                    </form>
                                </td>
                                <td class="px-0">{{ $cartItem->price }} <i class="fas fa-times"></i> {{ $cartItem->qty }} = {{ $total   =   $cartItem->qty * $cartItem->price }}</td>
                                @if(Route::currentRouteName() === 'checkout.index' || Route::currentRouteName() === 'buy-now')
                                @else
                                    <td>
                                        <form action="{{url("remove-cart")}}" method="post" id="removeForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cartItem->rowId }}">
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are your sure')"><span class="fas fa-times"></span></button>
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
                        <table class="table bg-white">
                            <thead>
                                <th class="">Total</th>
                                <th class="">{{ Cart::priceTotal() }}</th>
                            </thead>
                            <tbody>
                                <tr><td colspan="2" class="text-center">
                                        <a href="{{route('checkout.index')}}" class="btn btn-deepblue text-white border-radius-99">Checkout <i class="fas fa-arrow-right"></i></a>
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
        var mainBtn             =   $('#main');
        var cart                =   $('#cartArea');

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
            cart.removeClass('cartaria-width');
            mainBtn.removeClass('cartbtn-width');
        }
    </script>