<!DOCTYPE html>
<html lang="en">

<head><meta charset="windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#89C74A">
    <title>@yield('title')</title>
    <meta name="msnbot" content="index,follow" />
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="all" />
    <meta property="fb:app_id" content="345891736236545" />
    @yield('meta')
    <link rel="icon" href="{{asset('/')}}front/images/tab.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset("/") }}front/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
    @yield('css')
    @livewireStyles
    <link href="{{ asset("/") }}front/css/style.css" rel="stylesheet" type="text/css">
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '464004397564765');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=464004397564765&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8W6T7N53BY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8W6T7N53BY');
</script>
</head>

<body>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="345891736236545"
  theme_color="#67b868"
  logged_in_greeting="Welcome To Halal Ghor ðŸ˜Š. How Can We Help You ?"
  logged_out_greeting="Welcome To Halal Ghor ðŸ˜Š. How Can We Help You ?">
      </div>
    
    <!-- loading effect  -->
    <div class="loading-wrap d-none" id="moonLoader">
        <div id="lm"></div>
    </div>
    @include('front.include.header')
    <div id="body">
        @yield('body')
    </div>
    @include('front.include.footer')
    @include('front.cart.cart')
    @include('front.include.sticky-menu')
    <!-- goto top button  -->
    <a id="gotoTop"><i class="fas fa-angle-up c-pink font-weight-bold"></i></a>

    <!-- input track id modal -->
    <div class="modal fade" id="trackId" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Your Order Id </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <form action="{{ route("track-order") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-4">
                            <input type="text" name="order_id" class="form-control" placeholder="Order Id...."
                                required />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="form-control btn-dark" value="Check" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset("/") }}admin/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset("/") }}front/js/bootstrap.js"></script>
<script src="{{ asset("/") }}front/js/cart.js"></script>
@yield('js')
@livewireScripts
<!-- cart script  -->
<script>
    var footerMenuBtn = $('#sideMenuBtn');
    var cartOpenBtn = $('#cartOpenBtn');
    var cart = $('#cartArea');

    cartOpenBtn.on('click', function (e) {
        e.preventDefault();
        if ($(window).width() <= 425) {
            document.getElementById("cartArea").style.width = "100%";
            document.getElementById("main").style.marginRight = "100%";
        } else if ($(window).width() <= 768) {
            document.getElementById("cartArea").style.width = "70%";
            document.getElementById("main").style.marginRight = "70%";
        } else {
            document.getElementById("cartArea").style.width = "50%";
            document.getElementById("main").style.marginRight = "50%";
        }
    });

    function closeNav() {
        document.getElementById("cartArea").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
        cart.removeClass('w-50');
    }

    function closeFooterMenu() {
        document.getElementById("sideMenu").style.width = "0";
    }
    footerMenuBtn.on('click', function (e) {
        e.preventDefault();
        document.getElementById("sideMenu").style.width = "400px";
    });
</script>
<!-- goto top btn  -->
<script>
    var btn = $('#gotoTop');
    var footerMenuBtn = $('#footerMenuSec');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 550) {
            btn.addClass('d-block');
            footerMenuBtn.addClass('d-block');
        } else {
            btn.removeClass('d-block');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '550');
    });
</script>

</html>