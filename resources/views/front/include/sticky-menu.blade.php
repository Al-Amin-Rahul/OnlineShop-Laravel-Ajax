    <!-- footer menu area hidden -->
    <div id="sideMenu" class="side-menu-bar bg-deepblue">
        <a href="javascript:void(0)" class="side-menu-closebtn" onclick="closeFooterMenu()">&times;</a>
            <div class="container">
                <ul class="footer-menu-list">
                    <li class="pt-4">Welcome To | Halal Ghor</li>
                    <hr class="bg-green"/>
                    @foreach($categories as $category)
                        <li><a href="{{route("product-category", ['slug'  =>  $category->slug])}}"><i class="fas fa-shopping-cart c-green"></i> {{$category->category_name}}</a></li>
                    @endforeach
                    <li><a href="{{route("all-categories")}}"><i class="fas fa-caret-square-right text-primary"></i> All Categories</a></li>
                    <hr class="bg-green"/>
                    <li><a href="{{ route("contact-us") }}"><i class="fas fa-question text-danger"></i> Help</a></li>
                    <li><a href="{{ route("feedback") }}"><i class="fas fa-star text-warning"></i> Feedback</a></li>
                </ul>
            </div>
        </div>
    </div>
