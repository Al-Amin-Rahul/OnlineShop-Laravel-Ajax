<section class="top-header bg-green">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="top-header-list flex mb-1 mt-0">
                    <li><span class="pr-3 heading-5 c-blue"><i class="fas fa-phone"></i> Hotline : 01947-325581, 01750-521719</span></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="top-header-list flex mb-1 mt-0 justify-content-end">
                    @if(Session::get('customer_id'))
                        <li><a href="{{ route("customer-logout") }}" class="text-decoration-none pr-3 heading-5 c-blue"><i class="fas fa-arrow-right"></i>  LogOut</a></li>
                    @endif
                    @if(Session::get('customer_id'))
                    <li><a href="#" class="text-decoration-none pr-3 heading-5 c-blue" data-toggle="modal" data-target="#trackId"><i class="fas fa-map-marker-alt"></i> Track Order</a></li>
                    @else
                    <li><a href="{{ route("login") }}" class="text-decoration-none pr-3 heading-5 c-blue"><i class="fas fa-map-marker-alt"></i> Track Order</a></li>
                    @endif
                    <li><a href="{{ route("my-account") }}" class="text-decoration-none heading-5 c-blue"><i class="fas fa-address-card"></i>  My Account</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="logo">
                    <a class="text-decoration-none" href="/" aria-label="Logo">
                        <img src="{{ asset("/") }}front/images/weblogo.png"  class="img-fluid shadow-sm" alt=""/>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-8">
                <livewire:search-product />
            </div>
            <div class="col-lg-2 social d-lg-block d-md-none">
                <ul class="nav py-3 justify-content-between">
                    <li class="nav-link pl-0"><a aria-label="Link" href="https://www.facebook.com/halalghor"><i class="fab fa-facebook c-blue"></i></a></li>
                    <li class="nav-link"><a aria-label="Link" href="https://www.twitter.com/halalghor"><i class="fab fa-twitter c-blue"></i></a></li>
                    <li class="nav-link pr-0"><a aria-label="Link" href="https://www.youtube.com/channel/UCtnniAx6ZnH-FPSvR3H3FlA/"><i class="fab fa-youtube c-blue"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="sticky-top nav-bottom bg-green shadow-sm">
    <div class="container">
        <div class="row py-1">
            <div class="col-lg-12">
                <div class="menu">
                    <ul class="nav">
                        <li class="nav-link btn pl-0" id="sideMenuBtn"><a class="c-blue"><i class="fas fa-bars"></i></a></li>
                        <li class="nav-link font-weight-bold"><a href="/" class="c-blue"><i class="fas fa-home c-blue"></i> Home</a></li>
                        @if(Session::get("customer_id"))
                            <li class="nav-link font-weight-bold position-absolute dropdown-menu-right">
                                <span class="c-blue"><i class="fas fa-user c-blue"></i> {{ Session::get("customer_name") }}</span>
                            </li>
                        @else
                            <li class="nav-link font-weight-bold position-absolute dropdown-menu-right">
                                <a class="c-blue"  href="{{ route("login") }}"><i class="fas fa-user c-blue"></i> Login / Sign Up</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>