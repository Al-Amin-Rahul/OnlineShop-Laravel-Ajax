<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset("/") }}front/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ asset("/") }}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset("/") }}front/css/style.css" rel="stylesheet" type="text/css">

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
    <a id="gotoTop"><i class="fas fa-angle-up c-blue"></i></a>

    <!-- input track id modal -->
<div class="modal fade" id="trackId" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content alert-gray">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Enter Your Order Id <i class="fas fa-truck"></i></h5>
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
    <script src="{{ asset("/") }}front/js/comment.js"></script>
    <!-- cart script  -->
    <script>
        var footerMenuBtn       =   $('#footerMenuBtn');
        var cartOpenBtn         =   $('#cartOpenBtn');
        var cart     =   $('#cartArea');

        cartOpenBtn.on('click', function(e) {
        e.preventDefault();
            document.getElementById("cartArea").style.width = "40%";
            document.getElementById("main").style.marginRight = "40%";
        });
        function closeNav() {
            document.getElementById("cartArea").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            cart.removeClass('w-50');
        }
        function closeFooterMenu() {
            document.getElementById("footerMenuView").style.width = "0";
            document.getElementById("footerMenuSec").style.marginLeft = "0";
        }
        footerMenuBtn.on('click', function(e) {
        e.preventDefault();
            document.getElementById("footerMenuView").style.width = "300px";
            document.getElementById("footerMenuSec").addClass = "285px";
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
            footerMenuBtn.removeClass('d-block');
        }
        });

        btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '550');
        });

    </script>

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
</html>