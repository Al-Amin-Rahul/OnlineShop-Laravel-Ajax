@extends('front.master')

@section('title')
HalalGhor - {{$product->name}}
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
@endsection

@section('css')
<link href="{{ asset("/") }}front/css/jquery.lighter.css" rel="stylesheet" type="text/css">
@endsection
@section('body')
<section class="product-details-header pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a class='sample' data-height='720' data-lighter='samples/sample-01.jpg' data-width='1280'
                    href='{{asset($product->image)}}'>
                    <img src="{{asset($product->image)}}" title="Click" class="d-block w-100 img-thumbnail" alt=""></a>
            </div>
            <div class="col-lg-8">
                <div class="name pd pb-2">
                    <h2 class=" bb-yellow text-capitalize font-weight-bolder opacity-7">{{ $name    =   $product->name }}</h2>
                </div>
                <!-- review -->
                @php( $sum = 0 )
                @foreach($product->comments as $index => $comment)
                <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                @endforeach
                <div class="">
                    @if($sum == 0) @else
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
                <div class="code">Product Code : {{ $product->code }}</div>
                <div class="price pb-3 c-green font-weight-bold h2">৳
                    <span class="c-green font-weight-bold">
                        @if($product->category_id == 7 && $product->price_25 == 0)
                            @if($product->flash_sale == 1)
                            {{ number_format(($product->price - (($product->price * $product->flash_sale_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->occational_offer == 1)
                            {{ number_format(($product->price - (($product->price * $product->occational_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->daily_offer == 1)
                            {{ number_format(($product->price - (($product->price * $product->daily_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->mela == 1)
                            {{ number_format(($product->price - (($product->price * $product->mela_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @else
                            {{ $product->price }}
                            @endif
                        @elseif($product->category_id == 7 && $product->flash_sale == 1)
                            {{ number_format(($product->price_3 - (($product->price_3 * $product->flash_sale_ratio) / 100)), 2) }}
                            -
                            {{ number_format(($product->price_25 - (($product->price_25 * $product->flash_sale_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price_3 }} - {{ $product->price_25 }}</small></strike>
                        @elseif($product->category_id == 7 && $product->occational_offer == 1)
                            {{ number_format(($product->price_3 - (($product->price_3 * $product->occational_offer_ratio) / 100)), 2) }}
                            -
                            {{ number_format(($product->price_25 - (($product->price_25 * $product->occational_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price_3 }} - {{ $product->price_25 }}</small></strike>
                        @elseif($product->category_id == 7 && $product->daily_offer == 1)
                            {{ number_format(($product->price_3 - (($product->price_3 * $product->daily_offer_ratio) / 100)), 2) }}
                            -
                            {{ number_format(($product->price_25 - (($product->price_25 * $product->daily_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price_3 }} - {{ $product->price_25 }}</small></strike>
                        @elseif($product->category_id == 7 && $product->mela == 1)
                            {{ number_format(($product->price_3 - (($product->price_3 * $product->mela_offer_ratio) / 100)), 2) }}
                            -
                            {{ number_format(($product->price_25 - (($product->price_25 * $product->mela_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price_3 }} - {{ $product->price_25 }}</small></strike>
                        @elseif($product->category_id == 7)
                            {{ $product->price_3 }} - {{ $product->price_25 }}
                        @else
                            @if($product->flash_sale == 1)
                            {{ number_format(($product->price - (($product->price * $product->flash_sale_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->occational_offer == 1)
                            {{ number_format(($product->price - (($product->price * $product->occational_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->daily_offer == 1)
                            {{ number_format(($product->price - (($product->price * $product->daily_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @elseif($product->mela == 1)
                            {{ number_format(($product->price - (($product->price * $product->mela_offer_ratio) / 100)), 2) }}
                            <strike><small class="text-dark">{{ $product->price }}</small></strike>
                            @else
                            {{ $product->price }}
                            @endif
                        @endif
                    </span>
                </div>
                <div class="short-description text-justify pb-3">Description: {{ $product->description }}</div>
                <div class="pb-3">
                    @if($product->stock > 0)
                    <div class="stock text-success"><i class="fas fa-check-square"></i> In Stock</div>
                    @else
                    <div class="stock text-danger"><i class="fas fa-ban"></i> Stock Out</div>
                    @endif
                    <span><i class="fas fa-truck text-danger"></i> Delivery Within 1-3 Working Days</span>
                </div>
                @if($product->stock != 0)
                <form method="POST" action="{{route('buy-now')}}">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->previous() }}">
                    @if($product->category_id == 7 && $product->price_25 != 0)
                    <div class="form-group w-50">
                        <select class="form-control" id="weight" name="weight" data-id="{{ $product->id }}"
                            data-url="{{ url('show-perfume-price') }}">
                            <option value="0" selected="true" disabled="disabled">Select Option</option>
                            <option value="price_3">3 ml</option>
                            <option value="price_6">6 ml</option>
                            <option value="price_12">12 ml</option>
                            <option value="price_25">25 ml</option>
                        </select>
                    </div>
                    @endif
                    @if($product->category_id == 3)
                    <div class="form-group w-50">
                        <select class="form-control" id="weightWomen" name="weight">
                            <option value="0" selected="true" disabled="disabled">Select Size</option>
                            <option value="50">50</option>
                            <option value="52">52</option>
                            <option value="54">54</option>
                            <option value="56">56</option>
                        </select>
                    </div>
                    @endif
                    @if($product->category_id == 4)
                    <div class="form-group w-50">
                        <select class="form-control" id="weightMen" name="weight">
                            <option value="0" selected="true" disabled="disabled">Select Size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </div>
                    @endif

                    @if($product->category_id == 7 && $product->price_25 != 0)
                    <div class="price pb-3 text-danger font-weight-bold">৳ <span id="showPrice"></span></div>
                    <input type="hidden" name="perfume_price" value="0" id="perfumePrice">
                    @endif

                    <div class="cart">
                        <div class="row pb-3">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                                <div class="number">
                                    <span class="minus bg-warning font-weight-bold">-</span>
                                    <input type="number" name="qty" value="1" id="productQty">
                                    <span class="plus bg-warning font-weight-bold">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="socila-share col-lg-12">
                                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fhalalghor.com%2Fproduct-details%2F{{$product->slug}}&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                @if($product->category_id == 7 && $product->price_25 != 0)
                                <input type="submit" name="btn" value="Buy Now" id="buyNowBtn"
                                    class="btn btn-danger btn-link disabled btn-block">
                                @elseif($product->category_id == 3 || $product->category_id == 4)
                                <input type="submit" name="btn" value="Buy Now" id="buyNowBtn"
                                    class="btn btn-danger btn-link disabled btn-block">
                                @else
                                <input type="submit" name="btn" value="Buy Now" class="btn btn-danger btn-block">
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                            @csrf
                            <input type="hidden" name="weight" value="0" id="cartWeight">
                            @if($product->category_id == 7 && $product->price_25 != 0)
                            <input type="hidden" name="perfume_price_cart" value="0" id="perfume_price_cart">
                            @endif
                            @if($product->category_id == 7 || $product->category_id == 6)
                            <input type="hidden" name="wrap_val" value="" id="wrap_val">
                            @endif
                            <input type="hidden" name="qty" value="1" id="cartQty">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            @if($product->category_id == 3 || $product->category_id == 4 || $product->category_id == 7 && $product->price_25 != 0)
                            <input type="submit" name="btn" value="Add to Cart" id="addCartBtn"
                                class="btn btn-success btn-block btn-link disabled">
                            @else
                            <input type="submit" name="btn" value="Add to Cart" class="btn btn-success btn-block">
                            @endif
                        </form>
                    </div>
                </div>
                @else
                <button class="btn btn-warning btn-block btn-link disabled">Stock Out</button>
                <a href="{{ route("reminder", ['id' => $product->id]) }}" class="btn btn-primary btn-block">Turn On
                    Reminder For This Product</a>
                @endif
            </div>
        </div>
        <div class="row call-delivery pt-5">
            <div class="col-lg-12">
                <div class="wrap shadow rounded bg-gold c-blue">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="wrap px-4 p-3">
                                <span> <i class="fas fa-phone"></i> Call Us For Order : 01947-325581, 01750-521719</span></br>
                                <span> <i class="fas fa-envelope"></i> Email : halalghor@gmail.com</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="wrap px-4 p-3">
                                <span><i class="fas fa-hand-point-right"></i> Delivery Charge Insight Dhaka
                                    50Tk</span></br>
                                <span><i class="fas fa-hand-point-right"></i> Delivery Charge Outsight Dhaka
                                    100Tk</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="specification pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pb-xs-3">
                <div class="alert alert-gray c-blue font-weight-bold">
                    Product Details
                </div>
                <div class="wrapper">
                    <div class="list text-justify">
                        <span>{!! $product->product_feature !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-gray c-blue font-weight-bold">
                    Replace Policy
                </div>
                <div class="wrapper">
                    <div class="list">
                        <i class="fas fa-hand-point-right text-danger"></i> <span>Product will be replaced if it has any
                            defect by its manufacturer.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="alert alert-gray c-blue font-weight-bold">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">Ratings & Reviews</span></div>
                <!-- <div class="col-lg-6 text-right col-md-6 col-sm-6 col-6"><a href="" class="c-blue">More...</a></div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="wrapper" id="showComment">
                    @if($length == NULL)
                    <div class="font-weight-bolder alert alert-primary">No Reviews Yet</div>
                    @else
                    <div class="alert alert-success text-right">Total Rating and Reviews <span
                            class="badge badge-warning">{{ $length }}</span></div>
                    @foreach($comments as $comment)
                    <div class="row pb-3">
                        <div class="col-lg-1 col-md-1 col-2"><i class="fas fa-user-circle heading-2 c-pink"></i></div>
                        <div class="col-lg-11 col-md-11 col-10">
                            <div class="border-radius-99 alert-gray p-2 px-3">
                                <div class="name font-weight-bolder">{{ $comment->name }}</div>
                                <div class="comment text-justify">{{ $comment->comment }}</div>
                                <div class="rating text-right">
                                    @for($i=0 ; $i<$comment->rating; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                        @endfor
                                </div>
                            </div>
                            <div class="time"><small>{{ $comment->created_at->format('j F Y') }} -
                                    {{ $comment->created_at->diffForHumans() }}</small></div>
                            @if($comment->reply != 'NULL')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-1 col-2 pr-0"><i
                                                class="fas fa-user-circle heading-2 c-pink"></i></div>
                                        <div class="col-lg-9 col-md-11 col-10">
                                            <div class="border-radius-99 alert-gray p-2 px-3">
                                                <div class="name font-weight-bolder">Halal Ghor</div>
                                                <div class="reply text-justify">{{ $comment->reply }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div id="commentShow" data-url="{{ url('show-comment') }}" data-id="{{ $product->id }}"></div>
            
            <div class="col-lg-6">
            <hr>
                <form action="{{ route("comment.store") }}" method="post" id="commentForm">
                    @csrf
                    <div class="form-group">
                        <div class="stars">
                            <input class="stars__checkbox" type="radio" id="first-star" name="star" value="5">
                            <label class="stars__star five_star" for="first-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 53.867 53.867"
                                    style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                            10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 " />
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="second-star" name="star" value="4">
                            <label class="stars__star" for="second-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 53.867 53.867"
                                    style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                            10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 " />
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="third-star" name="star" value="3">
                            <label class="stars__star" for="third-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 53.867 53.867"
                                    style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                            10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 " />
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="fourth-star" name="star" value="2">
                            <label class="stars__star" for="fourth-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 53.867 53.867"
                                    style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                            10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 " />
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="fifth-star" name="star" value="1">
                            <label class="stars__star" for="fifth-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 53.867 53.867"
                                    style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                            10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 " />
                                </svg>
                            </label>
                            <span class="badge badge-warning">Select Star</span>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id=""
                                    class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="phone" id=""
                                    class="form-control" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" id=""
                            cols="30" rows="2" placeholder="Comment Here..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Post Review" class="btn btn-green btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="similar-product pb-5">
    <div class="container">
        @foreach($similar_products as $category)
        <div class="alert alert-gray c-blue font-weight-bold">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-8">Similar Product</div>
                <div class="col-lg-6 col-md-6 col-4 text-right"><a
                        href="{{ route("product-category", ['slug'    =>  $category->slug]) }}" class="c-blue">More <i
                            class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
        <div class="row">
            @php($count = 0)
            @foreach($category->products as $similar_product)
            @php($count++)
            @if($count >= 7)
            @continue
            @else
            <div class="col-lg-2 col-md-3 col-6 pb-2">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $similar_product->slug])}}"
                        class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($similar_product->image)}}" class="" alt=""
                                width="100%"></div>

                        <!-- review -->
                        @php( $sum = 0 )
                        @foreach($similar_product->comments as $index => $comment)
                        <input type="hidden" name="" value="{{$sum += $comment->rating}}">
                        @endforeach
                        <div class="text-center">
                            @if($sum == 0) <br> @else
                            <input type="hidden" name=""
                                value="{{ $average = number_format($sum / $lent =   count($similar_product->comments),2)}}">
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

                        <div class="title text-center name-overflow" title="{{ ($similar_product->name) }}">
                            <span>{{ $similar_product->name }}</span>
                        </div>
                        @if($similar_product->category_id == 7 && $similar_product->price_25 == 0)
                            @if($similar_product->flash_sale == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->flash_sale_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->occational_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->occational_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->daily_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->daily_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->mela == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->mela_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @else
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ $similar_product->price }}</span></div>
                            @endif
                        @elseif($similar_product->category_id == 7 && $similar_product->flash_sale == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($similar_product->price_3 - (($similar_product->price_3 * $similar_product->flash_sale_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($similar_product->price_25 - (($similar_product->price_25 * $similar_product->flash_sale_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($similar_product->category_id == 7 && $similar_product->daily_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($similar_product->price_3 - (($similar_product->price_3 * $similar_product->daily_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($similar_product->price_25 - (($similar_product->price_25 * $similar_product->daily_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($similar_product->category_id == 7 && $similar_product->occational_offer == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($similar_product->price_3 - (($similar_product->price_3 * $similar_product->occational_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($similar_product->price_25 - (($similar_product->price_25 * $similar_product->occational_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($similar_product->category_id == 7 && $similar_product->mela == 1)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                                {{ number_format(($similar_product->price_3 - (($similar_product->price_3 * $similar_product->mela_offer_ratio) / 100)), 2) }}
                                -
                                {{ number_format(($similar_product->price_25 - (($similar_product->price_25 * $similar_product->mela_offer_ratio) / 100)), 2) }}</span>
                        </div>
                        @elseif($similar_product->category_id == 7)
                        <div class="price text-center"><span class="c-green font-weight-bold">৳
                            {{ $similar_product->price_3 }} - {{ $similar_product->price_25 }}
                        </div>
                        @else
                            @if($similar_product->flash_sale == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->flash_sale_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->occational_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->occational_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->daily_offer == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->daily_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @elseif($similar_product->mela == 1)
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ number_format(($similar_product->price - (($similar_product->price * $similar_product->mela_offer_ratio) / 100)), 2) }}</span>
                            </div>
                            @else
                            <div class="price text-center"><span class="c-green font-weight-bold">৳
                                    {{ $similar_product->price }}</span></div>
                            @endif
                        @endif
                        @if($similar_product->category_id == 7 && $similar_product->price_25 != 0)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $similar_product->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @elseif($similar_product->category_id == 3 || $similar_product->category_id == 4)
                        <div class="text-center px-4">
                            <a href="{{route("product-details", ['slug'   =>  $similar_product->slug])}}"
                                class="btn btn-green">Select Size</a>
                        </div>
                        @else
                        <div class="cart text-center">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $similar_product->id }}">
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
        @endforeach
    </div>
</section>
@include('front.support.support')
@endsection
@section('js')
    <script src="{{ asset("/") }}front/js/comment.js"></script>
    <script src="{{ asset("/") }}front/js/weight.js"></script>
    <script src="{{ asset("/") }}front/js/product.qty.js"></script>
    <script src="{{ asset("/") }}front/js/jquery.lighter.js"></script>
    <script src="{{ asset("/") }}front/js/wrap.js"></script>
    <!-- increment decrement quantity -->
    <script>
        $(document).ready(function() {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>
@endsection
