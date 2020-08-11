@extends('front.master')

@section('title')
    HalalGhor - All Categories
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection
 
@section('body')
    <section class="all-categories pt-5">
        <div class="container">
            <div class="alert alert-gray c-blue font-weight-bold">
                All Categories
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-3 pb-4">
                        <a href="{{route("product-category", ['slug'  =>  $category->slug])}}" class="shadow rounded card bt-blue text-decoration-none">
                            <div class="cat-img">
                                <img src="{{asset($category->category_image)}}" width="100%" alt="">
                            </div>
                            <div class="cat-name c-blue text-center pt-2 pb-2">
                                {{$category->category_name}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection