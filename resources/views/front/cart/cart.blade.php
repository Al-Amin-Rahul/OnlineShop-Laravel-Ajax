<div class="side-cart" id="showCart">
    <!-- cart button  -->
<a id="cartOpenBtn">
    <section class="cart-view bg-gray shadow rounded" id="main">
        <div class="icon text-center">
            <span><i class="fas fa-cart-plus"></i><sup class="text-white cartBtn badge badge-dark">{{Cart::count() }}</sup></span>
        </div>
    </section>
</a>
<!-- cart area hidden -->
<div id="cartArea" class="cartbar">
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
                            @foreach(Cart::content() as $cartItem)
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
                                <th class="bg-dark c-wheat">{{ Cart::priceTotal() }}</th>
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
</div>
<div id="cartShow" data-url="{{ url('show-cart') }}"></div>