<!-- show cart -->
<a id="showCartOpenBtn">
    <section class="cart-view bg-gray shadow rounded" id="main" style="margin-right:{{ $btnClass }}">
        <div class="icon text-center">
            <span><i class="fas fa-cart-plus"></i><sup class="text-white cartBtn badge badge-dark" id="">{{ $count }}</sup></span>
        </div>
    </section>
</a>
<!-- cart area hidden -->
<div id="cartArea" class="cartbar {{ $viewClass }}">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="container-fluid">
        @if(Cart::count() != 0)
        <div class="row">
            <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table bg-dark c-wheat shadow rounded text-center" width="100%">
                            <thead>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            @php($sum=0)
                            @foreach($cartItems as $cartItem)
                            <tbody>
                                <td>{{ $cartItem->name }}</td>
                                <td><img src="{{asset( $cartItem->options->image )}}" width="50" alt=""></td>
                                <td>{{ $cartItem->qty }}</td>
                                <td>{{ $cartItem->price }}</td>
                                <td>{{ $total   =   $cartItem->qty * $cartItem->price }}</td>
                                <td>
                                    <form action="{{url("remove-cart")}}" method="post" id="removeForm">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cartItem->rowId }}">
                                        <button class="btn-circle btn-danger" type="submit" onclick="return confirm('Are your sure')"><span class="fas fa-times"></span></button>
                                    </form>
                                </td>
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
                        <table class="table">
                            <thead>
                                <th class="bg-dark c-wheat">Total</th>
                                <th class="bg-dark c-wheat">{{ $totalPrice }}</th>
                            </thead>
                            <tbody>
                                <tr><td colspan="2" class="text-center bg-dark">
                                    
                                        <a href="{{route('checkout.index')}}" class="btn btn-danger">Checkout <i class="fas fa-arrow-right"></i></a>
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
            document.getElementById("cartArea").style.width = "40%";
            document.getElementById("main").style.marginRight = "40%";
        });     
        function closeNav() {
            document.getElementById("cartArea").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            cart.removeClass('w-40');
        }
    </script>