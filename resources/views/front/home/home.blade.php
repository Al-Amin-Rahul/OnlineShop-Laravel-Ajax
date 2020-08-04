@extends('front.master')

@section('title')
HalalGhor - Home
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("/") }}front/css/owl.carousel.min.css">
@endsection

@section('body')
<section class="home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div id="carouselChange" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselChange" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselChange" data-slide-to="1"></li>
                        <li data-target="#carouselChange" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" id="carousel-inner">
                        @foreach($sliders as $slider)
                        <div class="carousel-item {{$slider->active}}">
                            <img src="{{asset($slider->slider_image)}}" class="d-block w-100" alt="..." height="400px">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container">
                    <div class="category-overlay position-absolute shadow rounded">
                        <ul class="menu-overlay">
                            @foreach($categories as $category)
                            <a class="c-blue" href="{{route("product-category", ['slug'  =>  $category->slug])}}">
                                <li><i class="fas fa-shopping-cart c-green"></i> {{$category->category_name}}</li>
                            </a>
                            @endforeach
                            <a class="c-blue" href="{{route("all-categories")}}">
                                <li><i class="fas fa-caret-square-right c-green"></i> All Categories</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($occational_offer_title != null)
<section class="occation pt-5 pb-5">
    <div class="container">
        <div class="alert alert-gray c-blue">
            <div class="row">
                <div class="col-lg-6 col-10 font-weight-bold">{{$occational_offer_title->occational_offer_title}} <i
                        class="fas fa-bomb c-green"></i></div>
                <div class="col-lg-6 col-2 text-right font-weight-bold"><a href="{{ route("occational-offer") }}"
                        class="c-blue">More <i class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="row">
            @foreach($occational_offer_products as $product)
            <div class="col-lg-2 col-md-3 col-6">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $product->slug])}}" class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt=""
                                width="100%"></div>
                        @if($product->occational_offer == 1)
                        <div class="badge badge-danger position-absolute border-radius-99 product-offer-badge">
                            -{{ $product->occational_offer_ratio }}%</div>
                        @endif
                        <!-- review -->
                        @php( $sum = 0 )
                        @foreach($product->comments as $index => $comment)
                        <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                        @endforeach
                        <div class="text-center">
                            @if($sum == 0) <br> @else
                            <input type="hidden" name=""
                                value="{{ $average = number_format($sum / $lent =   count($product->comments),2)}}">
                            <span class="star">
                                @for($i=1; $i <= 5; $i++) @if(round($average - .25)>= $i)
                                    <i class="fas fa-star"></i>
                                    @elseif(round($average + .25) >= $i)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </span>
                            @endif
                        </div>
                        <!-- review -->

                        <div class="title text-center name-overflow" title="{{ ($product->name) }}">
                            <span>{{ $product->name }}</span></div>
                        @if($product->category_id == 7 && $product->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price_3 - (($product->price_3 * $product->occational_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($product->price_25 - (($product->price_25 * $product->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        <div class="strike text-center">
                            <strike><small>{{ $product->price_3 }} - {{ $product->price_25 }}</small></strike>
                        </div>
                        @elseif($product->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($product->price - (($product->price * $product->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        <div class="strike text-center">
                            <strike><small>{{ $product->price }}</small></strike>
                        </div>
                        @else
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ $product->price }}</span></div>
                        @endif
                        @if($product->category_id == 3 || $product->category_id == 4 || $product->category_id == 7)
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
    </div>
</section>
@endif
<section class="all-categories bg-gold  pt-5">
    <div class="container">
        <div class="row">
            @foreach($top_categories as $category)
            <div class="col-lg-4 col-md-4 pb-5">
                <div class="">
                    <a href="{{route("product-category", ['slug'  =>  $category->slug])}}" class="text-decoration-none">
                        <div class="cat-img">
                            <img src="{{asset($category->category_image)}}" class="shadow border-radius-99" width="100%"
                                alt="">
                        </div>
                        <div class="shadow font-weight-bold c-blue text-center pt-2 pb-2">
                            {{$category->category_name}} <i class="fas fa-angle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- mela  -->
@if($mela != null)
<section class="mela pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("mela") }}" class="text-decoration-none" title="Click">
                    <div class="wrap shadow rounded bg-green">
                        <div class="row">
                            <div class="col-lg-12"><img src="{{asset($mela->image)}}" class="img-fluid" alt=""></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
@if($daily_offer_title != null)
<section class="promo pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("todays-offer") }}" class="text-decoration-none" title="Click">
                    <div class="wrap shadow rounded daily-offer">
                        <div class="row">
                            <div class="col-lg-3 col-3 img1">
                                <img src="{{asset('/')}}front/images/offer.png" alt="" class="promo-img img-fluid">
                            </div>
                            <div class="col-lg-6 col-6 title">
                                <div class=" heading-3 p-3 text-dark font-weight-bolder">
                                    {{$daily_offer_title->promotion_title}}
                                </div>
                            </div>
                            <div class="col-lg-3 col-3">
                                <img src="{{asset('/')}}front/images/shop.png" alt="" class="promo-img img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
<section class="flash-sale pt-5">
    <div class="container">
        <div class="alert alert-gray c-blue">
            <div class="row">
                <div class="col-lg-6 col-6 font-weight-bold">Flash Sale <i class="fas fa-clock c-green"></i></div>
                <!-- <span id="demo" class="bg-warning rounded p-3"></span> -->
                <div class="col-lg-6 col-6 text-right font-weight-bold"><a href="{{route("flash-sale")}}"
                        class="c-blue">More <i class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="row">
            @foreach($flash_sales as $flash_sale)
            <div class="col-lg-2 col-md-3 col-6 pb-3">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $flash_sale->slug])}}"
                        class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($flash_sale->image)}}" class="" alt=""
                                width="100%"></div>
                        @if($flash_sale->flash_sale == 1)
                        <div class="badge badge-danger position-absolute border-radius-99 product-offer-badge">
                            -{{ $flash_sale->flash_sale_ratio }}%</div>
                        @endif

                        <!-- review -->
                        @php( $sum = 0 )
                        @foreach($flash_sale->comments as $index => $comment)
                        <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                        @endforeach

                        <div class="text-center">
                            @if($sum == 0) <br> @else
                            <input type="hidden" name=""
                                value="{{ $average = number_format($sum / $lent =   count($flash_sale->comments),2)}}">
                            <span class="star">
                                @for($i=1; $i <= 5; $i++) @if(round($average - .25)>= $i)
                                    <i class="fas fa-star"></i>
                                    @elseif(round($average + .25) >= $i)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </span>
                            @endif
                        </div>
                        <!-- review -->

                        <div class="title text-center name-overflow" title="{{ ($flash_sale->name) }}"><span
                                class="">{{ $flash_sale->name }}</span></div>
                        @if($flash_sale->category_id == 7)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($flash_sale->price_3 - (($flash_sale->price_3 * $flash_sale->flash_sale_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($flash_sale->price_25 - (($flash_sale->price_25 * $flash_sale->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        <div class="strike text-center">
                            <strike><small>{{ $flash_sale->price_3 }} - {{ $flash_sale->price_25 }}</small></strike>
                        </div>
                        @else
                        <div class="price text-center"><span class="c-green font-weight-bold">
                                ৳
                                {{ number_format(($flash_sale->price - (($flash_sale->price * $flash_sale->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        <div class="strike text-center">
                            <strike><small>{{ $flash_sale->price }}</small></strike>
                        </div>
                        @endif
                        @if($flash_sale->category_id == 3 || $flash_sale->category_id == 4 || $flash_sale->category_id
                        == 7)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $flash_sale->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @else
                        <div class="cart text-center">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $flash_sale->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-green">
                            </form>
                        </div>
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="category pb-3">
    <div class="container">
        <div class="alert alert-gray c-blue">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-6 font-weight-bold">Top Sale <i class="fas fa-fire c-green"></i></div>
                <div class="col-lg-6 col-md-6 col-6 text-right font-weight-bold"><a href="{{route("top-sale")}}"
                        class="c-blue">More <i class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="row">
            @foreach($top_sales as $top_sale)
            <div class="col-lg-2 col-md-3 col-6">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $top_sale->slug])}}" class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($top_sale->image)}}" class="" alt=""
                                width="100%"></div>

                        <!-- review -->
                        @php( $sum = 0 )
                        @foreach($top_sale->comments as $index => $comment)
                        <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                        @endforeach

                        <div class="text-center">
                            @if($sum == 0) <br> @else
                            <input type="hidden" name=""
                                value="{{ $average = number_format($sum / $lent =   count($top_sale->comments),2)}}">
                            <span class="star">
                                @for($i=1; $i <= 5; $i++) @if(round($average - .25)>= $i)
                                    <i class="fas fa-star"></i>
                                    @elseif(round($average + .25) >= $i)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </span>
                            @endif
                        </div>
                        <!-- review -->

                        <div class="title text-center name-overflow" title="{{ ($top_sale->name) }}">
                            <span>{{ $top_sale->name }}</span></div>
                        @if($top_sale->category_id == 7 && $top_sale->flash_sale == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price_3 - (($top_sale->price_3 * $top_sale->flash_sale_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($top_sale->price_25 - (($top_sale->price_25 * $top_sale->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->category_id == 7 && $top_sale->daily_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price_3 - (($top_sale->price_3 * $top_sale->daily_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($top_sale->price_25 - (($top_sale->price_25 * $top_sale->daily_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->category_id == 7 && $top_sale->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price_3 - (($top_sale->price_3 * $top_sale->occational_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($top_sale->price_25 - (($top_sale->price_25 * $top_sale->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->category_id == 7 && $top_sale->mela == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price_3 - (($top_sale->price_3 * $top_sale->mela_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($top_sale->price_25 - (($top_sale->price_25 * $top_sale->mela_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->category_id == 7)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                            {{ $top_sale->price_3 }} - {{ $top_sale->price_25 }}
                        </div>
                        @else
                        @if($top_sale->flash_sale == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price - (($top_sale->price * $top_sale->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price - (($top_sale->price * $top_sale->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->daily_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price - (($top_sale->price * $top_sale->daily_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($top_sale->mela == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($top_sale->price - (($top_sale->price * $top_sale->mela_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @else
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ $top_sale->price }}</span></div>
                        @endif
                        @endif
                        @if($top_sale->category_id == 3 || $top_sale->category_id == 4 || $top_sale->category_id == 7)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $top_sale->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @else
                        <div class="cart text-center">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $top_sale->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-green">
                            </form>
                        </div>
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@foreach($category_products as $category)
<section class="category pb-3">
    <div class="container">
        <div class="alert alert-gray c-blue">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-8 font-weight-bold">{{ $category->category_name }} <i
                        class="fas fa-bolt c-green"></i></div>
                <div class="col-lg-6 col-md-6 col-4 text-right font-weight-bold"><a
                        href="{{ route("product-category", ['slug'   =>  $category->slug]) }}" class="c-blue">More <i
                            class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="row">
            @php($count = 0)
            @foreach($category->products as $product)
            @php($count++)
            @if($count == 5)
            @continue
            @else
            <div class="col-lg-2 col-md-3 col-6">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $product->slug])}}" class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt=""
                                width="100%"></div>

                        <!-- review -->
                        @php( $sum = 0 )
                        @foreach($product->comments as $index => $comment)
                        <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                        @endforeach
                        <div class="text-center">
                            @if($sum == 0) <br> @else
                            <input type="hidden" name=""
                                value="{{ $average = number_format($sum / $lent =   count($product->comments),2)}}">
                            <span class="star">
                                @for($i=1; $i <= 5; $i++) @if(round($average - .25)>= $i)
                                    <i class="fas fa-star"></i>
                                    @elseif(round($average + .25) >= $i)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </span>
                            @endif
                        </div>
                        <!-- review -->

                        <div class="title text-center name-overflow" title="{{ ($product->name) }}">
                            <span>{{ $product->name }}</span></div>
                        @if($product->category_id == 7 && $product->flash_sale == 1)
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

                        @if($product->category_id == 3 || $product->category_id == 4 || $product->category_id == 7)
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
            @endif
            @endforeach
        </div>
    </div>
</section>
@endforeach
<section class="testimonial pb-5 pt-5 bg-green">
    <div class="container">
        <h2 class="text-center font-weight-bold">Our Customers Say</h2>
        <div class="slider">
            <div class="owl-carousel">
                @foreach($feedbacks as $feedback)
                <div class="item shadow border-radius-99 bg-white">
                    <div class="p-5">
                        <div class="image text-center"><img src="{{asset($feedback->image)}}" alt="Client"></div>
                        <div class="name text-center font-weight-bold text-primary h4">{{ $feedback->name }}</div>
                        <div class="title text-center font-weight-bold">{{ $feedback->work }}</div>
                        <div class="comment text-justify">{{ $feedback->feedback }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ asset("/") }}front/js/owl.carousel.min.js"></script>
<script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            autoHeight:false,
            autoHeightClass: 'owl-height',
            nav:false,
            dots:false,
            responsiveClass:true,

            responsive: {
                0: {
                    items: 1,
                    nav:true,
                },
                768: {
                    items: 1,
                },
                1000: {
                    items: 1,
                    loop: true
                },
            }

        });
    </script>
@endsection
