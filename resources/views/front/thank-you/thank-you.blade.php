@extends('front.master')

@section('title')
    HalalGhor - Thank You
@endsection

@section('body')
    <section class="thank-you pt-5 pb-5">
        <div class="container">
            <div class="alert bg-success c-wheat">
                Dear {{ Session::get('customer_name') }} {{ $message }}
            </div>
            <div class="row pt-4">
                <div class="col-lg-12">
                    <div class="shadow rounded bg-dark c-wheat table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Order Id</th>
                                <th>Order Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ Session::get('customer_name') }}</td>
                                    <td>{{ Session::get('phone') }}</td>
                                    <td>{{ Session::get('order_id') }}</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <a href="/" class="back-home"><i class="fas fa-arrow-left"></i> Back To Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection