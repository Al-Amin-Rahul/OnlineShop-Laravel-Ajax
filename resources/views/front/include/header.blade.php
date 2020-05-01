<section class="top-header bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="top-header-list flex mb-1 mt-0">
                    <li><a href="" class="text-decoration-none pr-3 heading-5"><i class="fas fa-phone"></i> Hotline : 01666-666666, 01777-777777</a></li>
                    <!-- <div class="container">
                        <input type="text" placeholder="Search...">
                        <div class="search"></div>
                    </div> -->
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="top-header-list flex mb-1 mt-0 justify-content-end">
                    <li><a href="#" class="text-decoration-none pr-3 heading-5" data-toggle="modal" data-target="#trackId"><i class="fas fa-map-marker-alt"></i> Track Order</a></li>
                    <li><a href="" class="text-decoration-none pr-3 heading-5"><i class="fas fa-user"></i>  Sign up</a></li>
                    <li><a href="" class="text-decoration-none heading-5"><i class="fas fa-address-card"></i>  My Account</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="header bg-blue">
<div class="container">
    <nav class="navbar navbar-expand-lg p-0">
        <a class="navbar-brand text-decoration-none" href="/">
            <img src="{{ asset("/") }}front/images/weblogo.png"  class="img-thumbnail" alt=""/>
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <form action="{{ route("search/products") }}" method="post" class="search-form pr-3" id="searchProduct">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_field" placeholder="Search In YourShop" id="searchField">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit"> <i class="fas fa-search"></i> </button>
                        </div>
                    </div>
                </form>
                <span class="navbar-text">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="text-decoration-none"  href="/">Home</a>
                        </li>
                        @if(Route::currentRouteName() != '/')
                        <li class="nav-item pl-3" id="headerCategories">
                            <a class="text-decoration-none"  href="/"><i class="fas fa-th"></i> Categories <i class="fas fa-caret-down"></i></a>
                            <ul class="position-absolute header-sub-menu bg-light d-none rounded bb-yellow" id="categories-drop-down">
                                <div class="container pt-4 pl-4 pb-4">
                                    @foreach($categories as $category)
                                        <a class="text-decoration-none" href="{{route("product-category", ['id'  =>  $category->id])}}"><li><i class="fas fa-plus-square"></i> {{$category->category_name}}</li></a>
                                    @endforeach
                                </div>
                            </ul>
                        </li>
                        @endif
                        
                        <li class="nav-item pl-3">
                            <a class="text-decoration-none"  href="{{ route("login/user") }}"><i class="fas fa-user-circle"></i> Login</a>
                        </li>
                        <!-- @foreach($categories as $category)
                        <li class="nav-item pl-3" id="electronics">
                            <a class="text-decoration-none"  href="">{{$category->category_name}}</a>
                            <ul class="position-absolute sub-menu d-none rounded bb-yellow p-5 bl-blue" id="electronics-sub-menu">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-lg-2">
                                            <li class="heading-4 c-blue font-weight-bold bb-yellow">Casual</li>
                                            @foreach(App\Category::where('publication_status',1)->where('parent_id',$category->id)->get() as $sub_category)
                                                <li>{{$sub_category->category_name}}</li>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-2">
                                            <li class="heading-4 c-blue font-weight-bold bb-yellow">Heading</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                        </div>
                                        <div class="col-lg-2">
                                            <li class="heading-4 c-blue font-weight-bold bb-yellow">Heading</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                        </div>
                                        <div class="col-lg-2">
                                            <li class="heading-4 c-blue font-weight-bold bb-yellow">Heading</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                            <li>hover</li>
                                        </div>
                                        <div class="col-lg-4">
                                             <img src="{{ asset("/") }}front/images/p5.jpg"  class="img-thumbnail" alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        @endforeach -->
                        <!-- <li class="nav-item pr-3">
                            <a class="text-decoration-none"  href="/"> Grocery</a>
                        </li>
                        <li class="nav-item pr-3">
                            <a class="text-decoration-none last"href="/contact">Women's Fashion</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-decoration-none last"href="/contact">Kid's Fashion</a>
                        </li> -->
                    </ul>
                </span>
            </div>
            </nav>
        </div>
    </div>
</section>
