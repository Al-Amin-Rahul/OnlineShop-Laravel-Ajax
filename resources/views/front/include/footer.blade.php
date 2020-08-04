<section class="footer bg-dark pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 text-md-center text-lg-left text-center">
                <div class="c-green pb-2">INFORMATION</div>
                <ul class="footer-menu">
                    <li class="menu-item"><a href="{{ route("about-us") }}" class="text-decoration-none">About Us</a> </li>
                    <li class="menu-item"><a href="{{ route("contact-us") }}" class="text-decoration-none">Contact Us</a></li>
                    <li class="menu-item"><a href="https://www.facebook.com/halalghor" target="_blank" class="text-decoration-none">Facebook</a></li>
                    <li class="menu-item"><a href="https://www.youtube.com/channel/UCtnniAx6ZnH-FPSvR3H3FlA/" target="_blank" class="text-decoration-none">Youtube</a></li>
                    <li class="menu-item badge badge-primary"><a href="" target="_blank" class="text-decoration-none">Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-2 text-md-center text-lg-left text-center">
                <div class="c-green pb-2">CUSTOMER SERVICE</div>
                <ul class="footer-menu">
                    <li class="menu-item"><a href="{{ route("security-policy") }}" class="text-decoration-none">Security Policy</a> </li>
                    <li class="menu-item"><a href="{{ route("shipping-and-replacement") }}" class="text-decoration-none">Shipping & Replacement</a></li>
                    <li class="menu-item"><a href="{{ route("privacy-policy") }}" class="text-decoration-none">Privacy Policy</a></li>
                    <li class="menu-item"><a href="{{ route("terms-of-use") }}" class="text-decoration-none">Terms Of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-2 text-md-center text-lg-left text-center">
            <div class="c-green pb-2">MY ACCOUNT</div>
                <ul class="footer-menu">
                    <li class="menu-item"><a href="#" data-toggle="modal" data-target="#trackId" class="text-decoration-none">Track Order</a> </li>
                    <li class="menu-item"><a href="{{ route("my-account") }}" class="text-decoration-none">Account</a></li>
                    <li class="menu-item badge badge-warning"><a href="{{ route("feedback") }}" class="text-decoration-none text-dark">Feedback</a></li>
                </ul>
            </div>
            <div class="col-lg-2 text-md-center text-lg-left text-center">
            <div class="c-green pb-2">CONTACT US</div>
                <ul class="footer-menu">
                    <li class="menu-item"><i class="fa fa-map-marker-alt c-green"></i> <span class="c-wheat">98/2 Senpara porbota,Mirpur 1,Dhaka 12016</span></li>
                    <li class="menu-item"><i class="fa fa-envelope c-green"></i> <span class="c-wheat">halalghor@gmail.com</span></li>
                    <li class="menu-item"><i class="fa fa-mobile c-green"></i> <span class="c-wheat">+880 1947325581, +880 1750521719</span></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="heading-2 pb-2"><img class="w-100 img-thumbnail" src="{{ asset("/") }}front/images/weblogo.png" alt="logo"/></div>
                <div class="copyright text-center c-green">Copyright © {{ date("Y") }}, www.halalghor.com all rights reserved</div>
                <div class="soc-icons text-center pt-2 pb-xs-3">
                    <a href="https://www.facebook.com/halalghor" target="_blank"><i class="fab fa-facebook pr-3 text-wheat"></i></a>
                    <a href="https://www.google.com" target="_blank"><i class="fab fa-google pr-3 text-wheat"></i></a>
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter pr-3 text-wheat"></i></a>
                    <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin pr-3 text-wheat"></i></a>
                    <a href="https://www.youtube.com/channel/UCtnniAx6ZnH-FPSvR3H3FlA/" target="_blank"><i class="fab fa-youtube text-wheat"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form action="" method="">
                    <div class="input-group newslater">
                        <input type="email" name="email" class="form-control border-green" placeholder="Enter Your Email To SUbscribe Newslater" required/>
                        <div class="input-group-append">
                            <input type="submit" value="SUBSCRIBE" class="btn bg-green text-dark"/>
                        </div>
                    </div>
                    <div class="terms text-center c-wheat form-group pt-3">
                        <input type="checkbox" name="checkbox" class="" id="checkbox" required/> 
                        <label for="checkbox" class="c-green">I Agree The Terms && Condition</label>
                    </div>
                </form>
            </div>
        </div>
        <hr class="text-warning">
        <div class="row pt-3">
            <div class="col-lg-8">
                <ul class="payment-list flex justify-content-center justify-content-lg-start">
                    <li>
                        <p class="c-green">Payments We Accept</p>
                    </li>
                    <li class="px-3"><img class="img-thumbnail" src="{{ asset("/") }}front/images/bkash.png" alt="bkash" style="width:50px"></li>
                    <li><img class="img-thumbnail" src="{{ asset("/") }}front/images/nagad.png" alt="nagad" style="width:50px;height: 32px;"></li>
                    <li class="pl-3"><img class="" src="{{ asset("/") }}front/images/rocket.png" alt="nagad" style="width:50px;height: 32px;"></li>
                </ul>
            </div>
            <div class="col-lg-4 text-md-center text-lg-right text-center">
                <span class="c-wheat"><i class="fas fa-tools"></i> Developed By <a class="c-green" href="{{ route("developer-info") }}" target="_blank">Team</a></span>
            </div>
        </div>
    </div>
</section>