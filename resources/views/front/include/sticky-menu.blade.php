    <!-- footer menu area hidden -->
    <div id="sideMenu" class="side-menu-bar bg-deepblue">
        <a href="javascript:void(0)" class="side-menu-closebtn" onclick="closeFooterMenu()">&times;</a>
            <div class="container">
                <ul class="footer-menu-list">
                    <div class="wrap pt-4">
                        <li>Welcome To | Halal Ghor</li>
                    </div>
                    <hr class="bg-green"/>
                        @foreach($categories as $category)
                            <a href="{{route("product-category", ['slug'  =>  $category->slug])}}"><li><i class="fas fa-shopping-cart c-green"></i> {{$category->category_name}}</li></a>
                        @endforeach
                    <a href="{{route("all-categories")}}"><li><i class="fas fa-caret-square-right text-primary"></i> All Categories</li></a>
                    <hr class="bg-green"/>
                    <a href="{{ route("contact-us") }}"><li><i class="fas fa-question text-danger"></i> Help</li></a>
                    <a href="{{ route("feedback") }}"><li><i class="fas fa-star text-warning"></i> Feedback</li></a>
                </ul>
            </div>
        </div>
    </div>
