@extends('front.master')

@section('body')
    <section class="category-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <div id="carouselChange" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselChange" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselChange" data-slide-to="1"></li>
                            <li data-target="#carouselChange" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="carousel-item {{$slider->active}}">
                                    <img src="{{asset($slider->slider_image)}}" class="d-block w-100" alt="..." height="400px">
                                    <div class="carousel-caption d-none d-md-block">
                                        <!-- <h4 class="c-blue">First Slide</h4>
                                        <p class="c-blue">First Slide Description Will Goes Here</p> -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-product pt-5 pb-5">
        <div class="container">
        @foreach( $category_products as $category )
            <div class="alert alert-gray c-blue font-weight-bold">
                {{ $category->category_name }}
            </div>
            <div class="row">
                @foreach($category->products as $product)
                <div class="col-lg-2">
                    <div class="wrap hover product">
                        <a href="{{route("product-details", ['id'   =>  $product->id])}}" class="text-decoration-none">
                            <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt="" width="100%"></div>
                            <div class="title text-center"><span>{{ $product->name }}</span></div>
                            <div class="price text-center"><span class="text-danger font-weight-bold">৳ {{ $product->price }}</span></div>
                        </a>
                        <div class="cart text-center pb-2">
                            <!-- <button class="btn btn-outline-yellow addToCart" data-id="{{ $product->id }}" id="addToCart">Add To Cart</button> -->
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow btn-block">
                            </form>
                        </div>
                        <div class="cart text-center">
                            <form action="{{route('buy-now')}}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" name="btn" value="Buy Now" class="btn btn-outline-yellow btn-block">
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
@endsection