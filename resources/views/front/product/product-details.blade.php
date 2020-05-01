@extends('front.master')

@section('body')
    <section class="product-details-header pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{asset($product->image)}}" width="100%" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="name pb-2"><h2 class="bb-yellow text-capitalize font-weight-bolder opacity-7">{{ $product->name }}</h2></div>
                    <div class="code">Product Code : #product-{{ $product->code }}</div>
                    <div class="price pb-3"><span>Product Price : <span class="text-danger">৳ {{ $product->price }} Only</span></span></div>
                    <div class="short-description text-justify pb-3">Short Description : {{ $product->description }}</div>
                        @if($product->stock > 0)
                            <div class="stock text-success"><i class="fas fa-check-square"></i> In Stock</div>
                            @else
                            <div class="stock text-danger"><i class="fas fa-ban"></i> Stock Out</div>
                        @endif
                    <span><i class="fas fa-truck text-danger"></i> Delivery Within 2/3 Working Days</span>
                    <div class="cart pt-3">
                        <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                            <div class="row pb-3">
                                <div class="col-lg-2">
                                    <div class="number">
                                        <span class="minus bg-warning font-weight-bold">-</span>
                                        <input type="number" name="qty" value="1"/>
                                        <span class="plus bg-warning font-weight-bold">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="submit" name="btn" value="Add to Cart" class="btn btn-danger btn-block">
                                </div>
                            </form>
                            <div class="col-lg-6">
                                <form action="{{route('buy-now')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="submit" name="btn" value="Buy Now" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row call-delivery pt-5">
                <div class="col-lg-12">
                    <div class="wrap shadow rounded bg-gold c-blue">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="wrap px-4 p-3">
                                    <span> <i class="fas fa-phone"></i> Call Us For Order : +880 1645-733349, +880 1772-529099</span></br>
                                    <span> <i class="fas fa-envelope"></i> Email : yourshop@gmail.com</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="wrap px-4 p-3">
                                    <span><i class="fas fa-hand-point-right"></i> Delivery Charge Insight Dhaka 50Tk</span></br>
                                    <span><i class="fas fa-hand-point-right"></i> Delivery Charge Outsight Dhaka 100Tk</span>
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
            <div class="alert alert-gray c-blue font-weight-bold">
                Product Details
            </div>
            <div class="row">
                <div class="col-lg-6 text-justify">
                   <div class="wrapper px-4">
                        <div class="list">
                                <i class="fas fa-hand-point-right text-danger"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="list">
                                <i class="fas fa-hand-point-right text-danger"></i> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </div>
                   </div>
                </div>
                <div class="col-lg-6 text-justify">
                    <div class="wrapper px-4">
                        <div class="list">
                                <i class="fas fa-hand-point-right text-danger"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="list">
                                <i class="fas fa-hand-point-right text-danger"></i> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
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
                    <div class="col-lg-6">Ratings & Reviews</span></div>
                    <div class="col-lg-6 text-right"><a href="" class="c-blue">More...</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" >
                    <div class="wrapper" id="showComment">
                        @if($length == NULL)
                            <div class="font-weight-bolder alert alert-warning">Be First To Post A Review</div>
                        @else
                        <div class="alert alert-success text-right">Total Comments <span class="badge badge-warning">{{ $length }}</span></div>
                        @foreach($comments as $comment)
                        <div class="row pb-3">
                            <div class="col-lg-1"><i class="fas fa-user-circle heading-2"></i></div>
                            <div class="col-lg-11">
                                <div class="border-radius-99 alert-gray p-2 px-3">
                                    <div class="name font-weight-bolder">{{ $comment->name }}</div>
                                    <div class="comment text-justify">{{ $comment->comment }}</div>
                                    <div class="rating text-right">
                                        @for($i=0 ; $i<$comment->rating; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="time"><small>{{ $comment->created_at->format('j F Y') }} - {{ $comment->created_at->diffForHumans() }}</small></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div id="commentShow" data-url="{{ url('show-comment') }}" data-id="{{ $product->id }}"></div>
                <div class="col-lg-6">
                    <form action="{{ route("comment.store") }}" method="post" id="commentForm">
                        @csrf
                        <div class="form-group">
                        <div class="stars">
                            <input class="stars__checkbox" type="radio" id="first-star" name="star" value="5">
                            <label class="stars__star five_star" for="first-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 53.867 53.867" style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                        10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="second-star" name="star" value="4">
                            <label class="stars__star" for="second-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 53.867 53.867" style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                        10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="third-star" name="star"value="3">
                            <label class="stars__star" for="third-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 53.867 53.867" style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                        10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="fourth-star" name="star" value="2">
                            <label class="stars__star" for="fourth-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 53.867 53.867" style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                        10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
                                </svg>
                            </label>
                            <input class="stars__checkbox" type="radio" id="fifth-star" name="star" value="1">
                            <label class="stars__star" for="fifth-star">
                                <svg class="stars__star-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 53.867 53.867" style="enable-background:new 0 0 53.867 53.867;" xml:space="preserve">
                                    <polygon points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
                                        10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "/>
                                </svg>
                            </label>
                            <span class="badge badge-warning">Select Rating</span>
                        </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <input type="text" name="name" id="" class="form-control border-radius-99" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" id="" class="form-control border-radius-99" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="comment" class="form-control border-radius-99" id="" cols="30" rows="4" placeholder="Comment Here..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post Comment" class="border-radius-99 btn btn-dark btn-block">
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
                        <div class="col-lg-6">Similar Product</div>
                        <div class="col-lg-6 text-right"><a href="{{ route("product-category", ['id'    =>  $category->id]) }}" class="c-blue">More...</a></div>
                    </div>
                </div>
                <div class="row">
                    @foreach($category->products as $similar_product)
                        <div class="col-lg-2">
                            <div class="wrap hover product">
                                <a href="{{route("product-details", ['id'   =>  $similar_product->id])}}" class="text-decoration-none">
                                    <div class="banner img-hover-zoom"><img src="{{asset($similar_product->image)}}" class="" alt="" width="100%"></div>
                                    <div class="title text-center"><span>{{ $similar_product->name }}</span></div>
                                    <div class="price text-center"><span class="text-danger font-weight-bold">৳ {{ $similar_product->price }}</span></div>
                                </a>
                                <div class="cart text-center pb-2">
                                    <form action="{{route('add-to-cart')}}" method="POST" id="addToCartForm">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="id" value="{{ $similar_product->id }}">
                                        <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow btn-block">
                                    </form>
                                </div>
                                <div class="cart text-center">
                                    <form action="{{route('buy-now')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="id" value="{{ $similar_product->id }}">
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
    @include('front.support.support')

    <!-- <section class="recomended-product pt-5 pb-5">
        <div class="container">
            <div class="alert alert-gray c-blue fon-weight-bold">
                <div class="row">
                    <div class="col-lg-6">You May Also Like</div>
                    <div class="col-lg-6 text-right"><a href="" class="c-blue">More...</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="banner"><img src="{{asset('/')}}front/images/client3.jpg" alt="" width="100%"></div>
                    <div class="title text-center"><span>This is title of product</span></div>
                    <div class="price text-center"><span class="text-danger">BDT 350</span></div>
                    <div class="cart text-center bb-yellow pb-2">
                        <form action="">
                            <input type="submit" name="btn" value="Add to Cart" class="btn btn-outline-yellow">
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->
@endsection