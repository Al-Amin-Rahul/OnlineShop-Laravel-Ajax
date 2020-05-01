<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Category;
use App\Slider;
use App\Shipping;
use App\Product;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['sliders']                     =   Slider::where('publication_status',1)->where('location', 'home')->get();
        $data['top_categories']              =   Category::where('publication_status', 1)->take(3)->get();
        $data['category_products']           =   Category::with('products')->where('publication_status', 1)->get();
        $data['top_sales']                   =   Product::where('top_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(6)->get();
        $data['flash_sales']                 =   Product::where('flash_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(12)->get();
        $data['occational_offer_products']   =   Product::with('category')->where('occational_offer', 1)->get();

        // $search =   "7,9";
        // $separate   = explode(',', $search );
        // return $separate;
        // $get = Product::whereIn('category_id', $separate)->get();
        // return $get ;
        return view('front.home.home', $data);
    }
    public function productDetails($id)
    {
        $data['product']            =   Product::find($id);
        $data['similar_products']   =   Category::with('products')->where('publication_status', 1)->where('id', $data['product']->category_id)->get();
        $data['comments']           =   Comment::where('product_id', $id)->orderBy("id", "desc")->take(5)->get();
        $data['length']             =   count(Comment::where('product_id', $id)->orderBy("id", "desc")->get());
        return view('front.product.product-details', $data);
    }
    public function productCategory($id)
    {
        $data['sliders'] = Slider::where('publication_status',1)->where('location', 'category')->get();
        $data['category_products']   =   Category::with('products')->where('publication_status', 1)->where('id', $id)->get();
        return view('front.product.product-category', $data);
    }
    public function showAllCategories()
    {
        $data['categories'] =   Category::where('publication_status', 1)->get();
        return view('front.category.all-categories', $data);
    }

    public function showConfirmation()
    {
        return view('front.thank-you.thank-you')->with('message', ',, Thank You For Your Valuable Order Our Support Team Will Contact With You Soon !!!');
    }

    public function showOrder(Request $request)
    {
        $data['order']  =   Shipping::find($request->order_id);
        return view('front.order.track-order', $data);
    }

    public function showuserLoginForm()
    {
        return view('front.login.login');
    }
}
