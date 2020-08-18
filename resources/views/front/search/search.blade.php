<section class="search pt-5 pb-4">
    <div class="container">
        @if($products->isEmpty())
        <div class="shadow-sm rounded alert alert-gray font-weight-bold">
            Search Results For : "{{$key}}" <br /> No Results Found
        </div>
        @else
        <div class="shadow-sm rounded alert alert-gray font-weight-bold">
            Search Results For : "{{$key}}" <br /> Total <span class="badge bg-success">{{ $length }}</span> Results
            Found
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-2 col-md-3 col-6 pb-2">
                <div class="wrap hover product">
                    <a href="{{route("product-details", ['slug'   =>  $product->slug])}}" class="text-decoration-none">
                        <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt=""
                                width="100%"></div>
                        @if($product->flash_sale == 1)
                        <div class="badge badge-danger position-absolute product-offer-badge">
                            -{{ $product->flash_sale_ratio }}%</div>
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

                        <div class="title text-center name-overflow"><span>{{ $product->name }}</span></div>
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
        @endif
    </div>
</section>
