@extends('front.master')


@section('title')
HalalGhor - Flash Sale
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
            Flas Sale
        </div>
        <div class="row">
            @foreach($flash_sales as $flash_sale)
            <div class="col-lg-2 col-md-3 col-6 pb-2">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $flash_sale->slug])}}"
                        class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($flash_sale->image)}}" class="" alt=""
                                width="100%"></div>

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

                        <div class="title text-center name-overflow" title="{{ ($flash_sale->name) }}">
                            <span>{{ $flash_sale->name }}</span></div>
                        @if($flash_sale->flash_sale == 1)
                        <div class="badge badge-danger position-absolute border-radius-99 product-offer-badge">
                            -{{ $flash_sale->flash_sale_ratio }}%</div>
                        @endif
                        @if($flash_sale->category_id == 7 && $flash_sale->price_25 == 0)
                            <div class="price text-center"><span class="c-green font-weight-bold">
                                ৳ {{ number_format(($flash_sale->price - (($flash_sale->price * $flash_sale->flash_sale_ratio) / 100)), 2) }}</span>
                            </div>
                            <div class="strike text-center">
                                <strike><small>{{ $flash_sale->price }}</small></strike>
                            </div>
                        @elseif($flash_sale->category_id == 7)
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
                            ৳ {{ number_format(($flash_sale->price - (($flash_sale->price * $flash_sale->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        <div class="strike text-center">
                            <strike><small>{{ $flash_sale->price }}</small></strike>
                        </div>
                        @endif
                        @if($flash_sale->category_id == 7 && $flash_sale->price_25 != 0)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $flash_sale->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @elseif($flash_sale->category_id == 3 || $flash_sale->category_id == 4)
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
        <div class="pagination-wrap pt-5">
            {{ $flash_sales->links() }}
        </div>
    </div>
</section>
@endsection
