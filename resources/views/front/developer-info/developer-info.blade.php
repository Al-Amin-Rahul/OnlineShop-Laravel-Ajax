@extends('front.master')
@section('title')
    HalalGhor - Developer Info
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
<div class="container">
        <section class="container mt-4 mb-4">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex shadow border-radius-99 flex-row border rounded mb-5">
                            <div class="p-0 w-30">
                                <img src="{{ asset("/") }}front/images/raul.jpg" class="img-fluid" style="height:200px"/>
                            </div>
                            <div class="pl-3 pt-2 pr-2 pb-2 w-70 border-left">
                                <h4 class="text-dark">Al Amin Rahul</h4>
                                <h5 class="text-info">Full Stack Web Developer</h5>
                                <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                                    <li><i class="fab fa-facebook-square"></i> <a class="text-primary" href="https://www.facebook.com/alamin.rahul.545" target="_blank">Facebook</a></li>
                                    <li><i class="fas fa-mobile"></i> 01645733349 </li>
                                    <li><i class="fas fa-mobile"></i> 01873360311 </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex shadow border-radius-99 flex-row border rounded">
                            <div class="p-0 w-30">
                                <img src="{{ asset("/") }}front/images/mabub.jpg" class="img-fluid" style="height:200px"/>
                            </div>
                            <div class="pl-3 pt-2 pr-2 pb-2 w-70 border-left">
                                <h4 class="text-dark">K.M. Mahbubul</h4>
                                <h5 class="text-info">Full Stack Web Developer</h5>
                                <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                                    <li><i class="fab fa-facebook-square"></i> <a class="text-primary" href="https://www.facebook.com/mahbubul161" target="_blank">Facebook</a></li>
                                    <li><i class="fas fa-mobile"></i> 01620600428 </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection