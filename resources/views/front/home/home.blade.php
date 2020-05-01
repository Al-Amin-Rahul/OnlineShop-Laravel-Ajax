@extends('front.master')

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
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h4 class="text-danger font-weight-bolder">{{ $slider->title }}</h4>
                                        <p class="font-weight-bold text-dark">{{ $slider->short_description }}</p>
                                    </div> -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="container">
                        <div class="category-overlay position-absolute shadow rounded">
                            <ul class="menu-overlay">
                                <a href=""><li><i class="fas fa-undo text-success"></i> Home</li></a>
                                @foreach($categories as $category)
                                    <a href="{{route("product-category", ['id'  =>  $category->id])}}"><li><i class="fas fa-plus-square"></i> {{$category->category_name}}</li></a>
                                @endforeach
                                <a href="{{route("all-categories")}}"><li><i class="fas fa-caret-square-right text-primary"></i> All Categories</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="all-categories pt-5">
        <div class="container">
            <div class="row">
                @foreach($top_categories as $category)
                <div class="col-lg-4">
                    <a href="{{route("product-category", ['id'  =>  $category->id])}}" class="shadow rounded card bt-yellow text-decoration-none">
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
    <section class="promo pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="" class="text-decoration-none">
                        <div class="wrap shadow rounded bg-danger">
                            <div class="row">
                                <div class="col-lg-3 img1">
                                    <img src="{{asset('/')}}front/images/offer.png" alt="" class="promo-img img-fluid">
                                </div>
                                <div class="col-lg-6 title">
                                    <div class=" heading-3 p-3 font-weight-bolder">
                                        Save UpTo 70% Today
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{asset('/')}}front/images/shop.png" alt="" class="promo-img img-fluid">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="flash-sale pt-5">
        <div class="container">
            <div class="alert alert-gray c-blue">
                <div class="row">
                    <div class="col-lg-6 font-weight-bold">Flash Sale <i class="fas fa-clock text-danger"></i> <span id="demo" class="bg-warning rounded p-3"></span></div>
                    <div class="col-lg-6 text-right font-weight-bold"><a href="" class="c-blue">More <i class="fas fa-arrow-right"></i> </a></div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-2">
                    <div class="wrap product">
                        <a href="" class="text-decoration-none">
                            <div class="banner">
                                <img src="{{asset('/')}}front/images/pf4.jpg" alt="" width="100%" class="img-thumbnail">
                                <div class="product-img-overlay">
                                    <small class="bg-blue p-2 shadow rounded">Details</small>
                                </div>
                            </div>
                            <div class="title text-center"><span class="text-danger">This is title of product</span></div>
                            <div class="price text-center"><span class="text-danger">BDT 350</span></div>
                        </a>
                        <div class="cart text-center bb-yellow pb-2">
                            <form action="">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow">
                            </form>
                        </div>
                    </div>
                </div> -->
    
                @foreach($flash_sales as $flash_sale)
                <div class="col-lg-2 pb-3">
                    <div class="wrap hover product">
                        <a href="{{route("product-details", ['id'   =>  $flash_sale->id])}}" class="text-decoration-none">
                            <div class="banner img-hover-zoom"><img src="{{asset($flash_sale->image)}}" class="" alt="" width="100%"></div>
                            @if($flash_sale->flash_sale == 1)
                                <div class="badge badge-danger position-absolute product-offer-badge">-{{ $flash_sale->flash_sale_ratio }}%</div>
                            @endif
                            <div class="title text-center"><span>{{ $flash_sale->name }}</span></div>
                            <div class="price text-center"><span class="text-danger font-weight-bold">৳ <strike class="text-dark">{{ $flash_sale->price }}</strike> {{ number_format(($flash_sale->price - (($flash_sale->price * $flash_sale->flash_sale_ratio) / 100)), 2) }}</span></div>
                        </a>
                        <div class="cart text-center pb-2">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $flash_sale->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow btn-block">
                            </form>
                        </div>
                        <div class="cart text-center">
                            <form action="{{route('buy-now')}}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $flash_sale->id }}">
                                <input type="submit" name="btn" value="Buy Now" class="btn btn-outline-blue btn-block">
                            </form>
                        </div>
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
                    <div class="col-lg-6 font-weight-bold">Top Sale <i class="fas fa-bolt text-danger"></i></div>
                    <div class="col-lg-6 text-right font-weight-bold"><a href="" class="c-blue">More <i class="fas fa-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="row">
                @foreach($top_sales as $top_sale)
                <div class="col-lg-2">
                <div class="wrap hover product">
                        <a href="{{route("product-details", ['id'   =>  $top_sale->id])}}" class="text-decoration-none">
                            <div class="banner img-hover-zoom"><img src="{{asset($top_sale->image)}}" class="" alt="" width="100%"></div>
                            <div class="title text-center"><span>{{ $top_sale->name }}</span></div>
                            <div class="price text-center"><span class="text-danger font-weight-bold">৳ {{ $top_sale->price }}</span></div>
                        </a>
                        <div class="cart text-center pb-2">
                            <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $top_sale->id }}">
                                <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow btn-block">
                            </form>
                        </div>
                        <div class="cart text-center">
                            <form action="{{route('buy-now')}}" method="POST">
                                @csrf
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $top_sale->id }}">
                                <input type="submit" name="btn" value="Buy Now" class="btn btn-outline-yellow btn-block">
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    @foreach($category_products as $category)
    @if($category->id == 10)
    @continue
    @else
    <section class="category pb-3">
        <div class="container">
            <div class="alert alert-gray c-blue">
                <div class="row">
                    <div class="col-lg-6 font-weight-bold">{{ $category->category_name }}<i class="fas fa-bolt text-danger"></i></div>
                    <div class="col-lg-6 text-right font-weight-bold"><a href="{{ route("product-category", ['id'   =>  $category->id]) }}" class="c-blue">More <i class="fas fa-arrow-right"></i></a></div>
                </div>
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
        </div>
    </section>
    @endif
    @endforeach

    <script>
        var month  =   "May 20";
        var year   =   "2020";
        var time   =    "12:00";
        var endDate =   month+' ,'+year+" "+time;
        var countDownDate   =   new Date(endDate).getTime();

        var x = setInterval(function(){
        // Get today's date and time
        var now = new Date().getTime();
        
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d: " + hours + "h: "
        + minutes + "m: " + seconds + "s ";
        
        // If the count down is over, write some text 
        if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
    </script>
@endsection