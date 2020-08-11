@extends('front.master')

@section('title')
    HalalGhor - Login
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
<section class="py-5">
    <div class="container">
    @include('message.message')
        <div class="row">
            <div class="col-lg-6 pb-5">
                <div class="alert alert-gray c-blue">
                    <span class="font-weight-bold">Login</span>
                </div>
                <div class="wrapper shadow rounded p-5 bg-warning">
                    <form action="{{ route("customer-login") }}" method="POST">
                        @csrf
                        <input type="hidden" name="url" value="{{ URL::previous() }}">
                        <div class="form-group">
                            <input type="number" name="customer_phone" placeholder="Phone Number" class="form-control input-d-1">
                        </div>
                        <div class="form-group">
                            <input type="password" name="customer_password" placeholder="Password" class="form-control input-d-1">
                        </div>
                        <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
                    </form>
                </div>
                <div class="row mt-5">
                    <div class="container">
                        <form action="{{ route("guest-login") }}" method="Post">
                            @csrf
                            <input type="hidden" name="url" value="{{ URL::previous() }}">
                            <input type="submit" value="Continue As Guest" name="guest" class="form-control btn btn-dark">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-gray c-blue">
                    <span class="font-weight-bold">Sign Up</span>
                </div>
                    <form action="{{ route("new-customer") }}" method="POST">
                        @csrf
                        <input type="hidden" name="url" value="{{ URL::previous() }}">
                        <div class="wrapper shadow rounded p-5 bg-warning">
                            <div class="form-group">
                                <input type="text" name="customer_name" placeholder="Name" class="form-control input-d-1">
                            </div>
                            <div class="form-group">
                                <input type="number" name="customer_phone" placeholder="Phone Number" class="form-control input-d-1">
                            </div>
                            <div class="form-group">
                                <textarea name="customer_address" id="" cols="30" rows="3" class="form-control input-d-1" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="password" name="customer_password" placeholder="Password" class="form-control input-d-1">
                            </div>
                            <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
