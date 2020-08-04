<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#89C74A">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Gabriela&display=swap" rel="stylesheet">
    <link href="{{ asset("/") }}front/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ asset("/") }}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    @yield('css')
    <link href="{{ asset("/") }}front/css/style.css" rel="stylesheet" type="text/css">
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />

</head>
<body>
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
<div class="modal fade" id="trackId" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Enter Your Order Id <i class="fas c-pink fa-truck"></i></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route("track-order") }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="input-group mb-4">
                    <input type="text" name="order_id" class="form-control" placeholder="Order Id...." required/>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="form-control btn-success" value="Submit"/>
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
    <script src="{{ asset("/") }}front/js/search.js"></script>
    @yield('js')
    <!-- cart script  -->
    <script>
        var footerMenuBtn       =   $('#sideMenuBtn');
        var cartOpenBtn         =   $('#cartOpenBtn');
        var cart     =   $('#cartArea');

        cartOpenBtn.on('click', function(e) {
        e.preventDefault();
            if($(window).width() <= 425)
            {
                document.getElementById("cartArea").style.width = "100%";
                document.getElementById("main").style.marginRight = "100%";
            }
            else if($(window).width() <= 768)
            {
                document.getElementById("cartArea").style.width = "70%";
                document.getElementById("main").style.marginRight = "70%";
            }
            else
            {
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
        footerMenuBtn.on('click', function(e) {
        e.preventDefault();
            document.getElementById("sideMenu").style.width = "400px";
        });
    </script>
    <!-- goto top btn  -->
    <script>
        var btn = $('#gotoTop');
        var footerMenuBtn = $('#footerMenuSec');

        $(window).scroll(function() {
        if ($(window).scrollTop() > 550) {
            btn.addClass('d-block');
            footerMenuBtn.addClass('d-block');
        } else {
            btn.removeClass('d-block');
        }
        });

        btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '550');
        });

    </script>
</html>