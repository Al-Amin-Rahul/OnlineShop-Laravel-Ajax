@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">View Order Details</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="alert alert-dark">
                Order Customer Info</div>
            <div class="shadow rounded">
                <div class="table-responsive">
                    @include("message.message")

                    <table width="100%" class="table" id="dataTables-example">
                        <tr>
                            <th>Name</th>
                            <td>{{ $shipping->name }}</td>
                        </tr>

                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $shipping->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $shipping->email }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $shipping->address }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $shipping->status }}</td>
                        </tr>
                        @if($shipping->payment_status == 1)
                        <tr>
                            <th>Payment Type</th>
                            <td>Cash On Delivery</td>
                        </tr>
                        @elseif($shipping->payment_status == 2)
                        <tr>
                            <th>Payment Type</th>
                            <td>Bkash</td>
                        </tr>
                        @elseif($shipping->payment_status == 3)
                        <tr>
                            <th>Payment Type</th>
                            <td>Rocket</td>
                        </tr>
                        @else
                        <tr>
                            <th>Payment Type</th>
                            <td></td>
                        </tr>
                        @endif
                        <tr>
                            <th>Order Id</th>
                            <td>{{ $shipping->id }}</td>
                        </tr>
                        <tr>
                            <th>Date & Time</th>
                            <td>{{ $shipping->created_at }}</td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>

        <div class="card mb-3">
            <div class="alert bg-warning text-dark">
                Order Product Info</div>
            <div class="shadow rounded">
                <div class="table-responsive">
                    @include("message.message")

                    <table width="100%" class="table" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Unit price (BDT)</th>
                            <th>Quantity</th>
                            <th>Weight</th>
                            <th></th>
                            <th>Price (BDT)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $i = 1 )
                        @php( $sum = 0 )
                        @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>{{ $price = $orderDetail->product_price }}</td>
                            <td>{{ $qty = $orderDetail->product_qty }}</td>
                            <td>{{ $weight = $orderDetail->product_weight }}</td>
                            <td></td>
                            <td>{{ $total = $price * $qty }}
                            {{Session::put('totalPrice', $orderDetail->order_total)}}
                            </td>
                        </tr>
                        @endforeach
                        @if($orderDetail->dis_code)
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Discount Id</th>
                        <th>{{ $orderDetail->dis_code }}</th>
                        </tr>
                        @endif
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Delivery Charge</th>
                        <th>{{ $shipping->delivery }} Tk</th>
                        </tr>
                        @if($orderDetail->product_wrap == 1)
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Gift Wrap</th>
                        <th>20 Tk</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total (BDT)</th>
                            <th>TK. {{$grandTotal   =   $shipping->delivery + Session::get('totalPrice')}}</th>
                        </tr>
                        @else
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total (BDT)</th>
                            <th>TK. {{$grandTotal   =   $shipping->delivery + Session::get('totalPrice')}}</th>
                        </tr>
                        @endif
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

@endsection