<section class="search pt-5 pb-4">
    <div class="container">
    @if($products->isEmpty())
        <div class="alert alert-danger">
            No Results Found
        </div>
        @else
        <div class="alert alert-success">
            <span class="badge bg-warning">{{ $length }}</span> Results Found
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-2 pb-3">
                    <div class="wrap hover product">
                        <a href="{{route("product-details", ['id'   =>  $product->id])}}" class="text-decoration-none">
                            <div class="banner img-hover-zoom"><img src="{{asset($product->image)}}" class="" alt="" width="100%"></div>
                            @if($product->flash_sale == 1)
                                <div class="badge badge-danger position-absolute product-offer-badge">-{{ $product->flash_sale_ratio }}%</div>
                            @endif
                            <div class="title text-center"><span>{{ $product->name }}</span></div>
                            <div class="price text-center"><span class="text-danger font-weight-bold">৳ <strike class="text-dark">{{ $product->price }}</strike> {{ number_format(($product->price - (($product->price * $product->flash_sale_ratio) / 100)), 2) }}</span></div>
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
                                <input type="submit" name="btn" value="Buy Now" class="btn btn-outline-blue btn-block">
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        @endif
    </div>
</section>