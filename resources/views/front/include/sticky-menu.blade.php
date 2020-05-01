    <!-- footer menu  -->
    <a id="footerMenuBtn">
        <section class="footer-menu bg-dark shadow rounded" id="footerMenuSec">
            <div class="icon text-center">
                <span><i class="fas fa-bars"></i>
            </div>
        </section>
    </a>

    <!-- footer menu area hidden -->
    <div id="footerMenuView" class="footer-menu-bar">
        <a href="javascript:void(0)" class="footer-closebtn" onclick="closeFooterMenu()">&times;</a>
            <div class="container">
                <ul class="footer-menu-list">
                    <div class="wrap pt-4">
                        <li>Welcome To | MySite</li>
                    </div>
                    <hr class="bg-warning"/>
                    <a href="/"><li><i class="fas fa-undo text-success"></i> Home</li></a>
                        @foreach($categories as $category)
                            <a href="{{route("product-category", ['id'  =>  $category->id])}}"><li><i class="fas fa-plus-square"></i> {{$category->category_name}}</li></a>
                        @endforeach
                    <a href=""><li><i class="fas fa-caret-square-right text-primary"></i> All Categories</li></a>
                    <hr class="bg-warning"/>
                    <a href=""><li><i class="fas fa-question text-danger"></i> Help</li></a>
                    <a href=""><li><i class="fas fa-star text-warning"></i> Feedback</li></a>
                </ul>
            </div>
        </div>
    </div>
