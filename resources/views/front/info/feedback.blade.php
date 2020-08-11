@extends('front.master')

@section('title')
    HalalGhor - Feedback
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
                        Tell Us Your Speech !!!
                    </div>
                    @include('message.message')
                    <form action="{{ route("save-feedback") }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-lg-3 col-form-label">Name</label>
                            <div class="col-sm-9 col-lg-9">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="work" class="col-sm-3 col-lg-3 col-form-label">Work Title</label>
                            <div class="col-sm-9 col-lg-9">
                                <input type="text" name="work" class="form-control" id="work">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feedback" class="col-sm-3 col-lg-3 col-form-label">Feedback</label>
                            <div class="col-sm-9 col-lg-9">
                                <textarea name="feedback" id="feedback" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection