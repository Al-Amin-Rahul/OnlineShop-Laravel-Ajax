@extends('front.master')

@section('title')
    HalalGhor - Set Reminder
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-primary">
                        Enter Your Name & Phone Number To Set Reminder For This Product. We Will Contact With You Soon 
                    </div>
                    @include('message.message')
                    <form action="{{ route("save-reminder") }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group row">
                        <label for="customerName" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="customer_name" class="form-control" id="customerName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="customerPhone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" name="customer_phone" class="form-control" id="customerPhone">
                        </div>
                    </div>
                    <input class="form-control btn btn-primary" type="submit" value="Set Reminder" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection