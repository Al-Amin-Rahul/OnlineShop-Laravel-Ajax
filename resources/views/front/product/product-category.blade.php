@extends('front.master')

@section('title')
HalalGhor - {{$category->category_name}}
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection

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
                            <img src="{{asset($slider->slider_image)}}" class="img-fluid w-100" alt="..."
                                height="400px">
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
        <div class="alert alert-gray c-blue font-weight-bold">
            {{ $category->category_name }}
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-2 col-md-3 col-6 pb-2">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $product->slug])}}" class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt=""
                                width="100%"></div>
                        <div class="title text-center name-overflow" title="{{ ($product->name) }}">
                            <span>{{ $product->name }}</span></div>
                        @if($product->category_id == 7 && $product->price_25 == 0)
                            @if($product->flash_sale == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->flash_sale_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->occational_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->occational_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->daily_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->daily_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->mela == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->mela_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @else
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ $product->price }}</span></div>
                            @endif
                        @elseif($product->category_id == 7 && $product->flash_sale == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price_3 - (($product->price_3 * $product->flash_sale_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($product->price_25 - (($product->price_25 * $product->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($product->category_id == 7 && $product->daily_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price_3 - (($product->price_3 * $product->daily_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($product->price_25 - (($product->price_25 * $product->daily_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($product->category_id == 7 && $product->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price_3 - (($product->price_3 * $product->occational_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($product->price_25 - (($product->price_25 * $product->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($product->category_id == 7 && $product->mela == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price_3 - (($product->price_3 * $product->mela_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($product->price_25 - (($product->price_25 * $product->mela_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($product->category_id == 7)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                            {{ $product->price_3 }} - {{ $product->price_25 }}
                        </div>
                        @else
                            @if($product->flash_sale == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->flash_sale_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->occational_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->occational_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->daily_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->daily_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($product->mela == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($product->price - (($product->price * $product->mela_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @else
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ $product->price }}</span></div>
                            @endif
                        @endif
                        @if($product->category_id == 7 && $product->price_25 != 0)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $product->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @elseif($product->category_id == 3 || $product->category_id == 4)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $product->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @else
                        <div class="cart text-center">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-green">
                            </form>
                        </div>
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrap pt-5">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
