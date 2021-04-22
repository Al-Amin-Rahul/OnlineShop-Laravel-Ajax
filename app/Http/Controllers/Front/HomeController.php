<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Category;
use App\Slider;
use App\Shipping;
use App\Product;
use App\Comment;
use App\Mela;
use App\DailyOffer;
use App\OccationalOffer;
use App\Feedback;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\URL;


class HomeController extends Controller
{
    public $description    =   'Halal Ghor is an Islamic online shop in Bangladesh. We sell almost all Islamic products. One of our main objectives is to provide organic and fresh products Alhamdulillah. Halal Ghor have a own honey collector team, own various of oil production team and also a packaging team. Halal Ghor support cash on delivery of anywhere in Bangladesh. We are work for premium quality products and ensure lower product cost.';
    public $metaTitle      =   'Halal Ghor - An Islamic Online Shop In Bangladesh';
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
        $data['sliders']                     =   Slider::select(["id", "active", "slider_image"])->where('publication_status',1)->where('location', 'home')->get();
        $data['top_categories']              =   Category::select(["id", "category_name", "category_image", "slug"])->where('publication_status', 1)->orderBy("id", "desc")->take(3)->get();
        
        $data['category_products']           =   Category::select(["id", "category_name", "slug"])->where('publication_status', 1)->orderBy('id', 'desc')->get();
                                   
        $data['top_sales']                   =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'occational_offer', 'occational_offer_ratio', 'daily_offer', 'daily_offer_ratio', 'mela', 'mela_offer_ratio', 'image')->with(['comments' => function($query){
                                                    $query->select("id", "product_id", "rating");
                                                }])->where('top_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(6)->get();

        $data['flash_sales']                 =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'image')->with(['comments' => function($query){
                                                    $query->select("id", "product_id", "rating");
                                    }])->where('flash_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(12)->get();

        $data['occational_offer_title']      =   OccationalOffer::select(["id", "occational_offer_title"])->where('publication_status', 1)->first();
        $data['occational_offer_products']   =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'occational_offer', 'occational_offer_ratio', 'image')->with(['comments' => function($query){
                                                    $query->select("id", "product_id", "rating");
                                                }])->where('occational_offer', 1)->orderBy("id", "desc")->take(6)->get();

        $data['feedbacks']                   =   Feedback::select(["id", "name", "work", "feedback", "image"])->orderBy("id", "desc")->get();
        $data['daily_offer_title']           =   DailyOffer::select(["id", "promotion_title"])->where('publication_status', 1)->first();
        $data['mela']                        =   Mela::select(["id", "image"])->where('publication_status', 1)->first();

        SEOMeta::addMeta('title', $this->metaTitle, 'name');
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['halalghor', 'halal ghor', 'HalalGhor', 'Halal Ghor', 'halal', 'Online Shopping']);
        SEOMeta::setCanonical(URL::current());

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setTitle($this->metaTitle);
        OpenGraph::setDescription($this->description);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('https://halalghor.com/front/images/home.PNG');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('author', 'Sohel Rana');


        return view('front.home.home', $data);
    }
    public function productDetails($slug)
    {
        $data['product']            =   Product::all()->where("slug", $slug)->first();
        $data['similar_products']   =   Category::select("id", "slug")->with(['products' => function($query){
                                            $query->select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'occational_offer', 'occational_offer_ratio', 'daily_offer', 'daily_offer_ratio', 'mela', 'mela_offer_ratio', 'image')->where('publication_status', 1)->orderBy('id', 'desc');
                                        }])->where('publication_status', 1)->where('id', $data['product']->category_id)->get();

        $data['comments']           =   Comment::where('product_id', $data['product']->id)->orderBy("id", "desc")->take(5)->get();
        $data['length']             =   count(Comment::where('product_id', $data['product']->id)->orderBy("id", "desc")->get());
        
        SEOMeta::addMeta('title', $data['product']->name);
        SEOMeta::setDescription($data['product']->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($data['product']->description);
        OpenGraph::setTitle($data['product']->name);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addImage('https://halalghor.com/'.$data['product']->image);
 

        return view('front.product.product-details', $data);
    }
    public function productCategory($slug)
    {
        $data['sliders']    = Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get();     
        $data['category']   = Category::select("id", "category_name", "category_image")->where('publication_status', 1)->where('slug', $slug)->first();
        $data['products']   = Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'occational_offer', 'occational_offer_ratio', 'daily_offer', 'daily_offer_ratio', 'mela', 'mela_offer_ratio', 'image')->where('publication_status', 1)->where("category_id", $data['category']->id)->paginate(12);

        SEOMeta::addMeta('title', $data['category']->category_name);
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle($data['category']->category_name);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addImage('https://halalghor.com/'.$data['category']->category_image);

        return view('front.product.product-category', $data);
    }
    public function showAllCategories()
    {
        $data['categories'] =   Category::where('publication_status', 1)->get();
        return view('front.category.all-categories', $data);
    }

    public function showConfirmation()
    {
        return view('front.thank-you.thank-you')->with('message', 'আলহামদুলিল্লাহ! আপনার অর্ডারটি সম্পন্ন হয়েছে। অনুগ্রহ করে আপনার অর্ডার আইডি সংরক্ষিত রাখুন। ইনশাআল্লাহ দ্রুত আমাদের প্রতিনিধি আপনার সাথে যোগাযোগ করবে ।');
    }

    public function showOrder(Request $request)
    {
        $sub   =   substr($request->order_id, '3');
        $data['order']  =   Shipping::find($sub);
        return view('front.order.track-order', $data);
    }

    public function showuserLoginForm()
    {
        return view('front.login.login');
    }
    public function showusersignUpForm()
    {
        return view('front.login.sign-up');
    }
    public function flashSale()
    {
        $data['sliders']        =   Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get();     
        $data['flash_sales']    =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'image')->where('flash_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->paginate(12);
        
        SEOMeta::addMeta('title', 'HalalGhor - Flash Sale');
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle('HalalGhor - Flash Sale');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        // OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.flash-sale.flash-sale', $data);
    }
    public function topSale()
    {
        $data['sliders']        =   Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get();     
        $data['top_sales']      =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'flash_sale', 'flash_sale_ratio', 'occational_offer', 'occational_offer_ratio', 'daily_offer', 'daily_offer_ratio', 'mela', 'mela_offer_ratio', 'image')->where('top_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->paginate(12);
        
        SEOMeta::addMeta('title', 'HalalGhor - Top Sale');
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle('HalalGhor - Top Sale');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');

        return view('front.top-sale.top-sale', $data);
    }
    public function todaysOffer()
    {
        $data['daily_offer_products']        =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'daily_offer', 'daily_offer_ratio', 'image')->where('publication_status', 1)->where('daily_offer', 1)->paginate(12);
        $data['sliders']                     =   Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get();     
        
        SEOMeta::addMeta('title', 'HalalGhor - Daily Offer');
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle('HalalGhor - Daily Offer');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');

        return view('front.daily-offer.daily-offer', $data);
    }
    public function mela()
    {
        $data['melar_products']              =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'mela', 'mela_offer_ratio', 'image')->where('publication_status', 1)->where('mela', 1)->paginate(12);
        $data['sliders']                     =   Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get();     
        
        SEOMeta::addMeta('title', 'HalalGhor - Mela');
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle('HalalGhor - Mela');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');

        return view('front.mela.mela', $data);
    }
    public function occationalOffer()
    {
        $data['occational_offer_title']           =   OccationalOffer::where('publication_status', 1)->find(1);
        $data['occational_offer_products']        =   Product::select("id", "slug", 'category_id', 'name', 'price', 'price_3', 'price_6', 'price_12', 'price_25', 'occational_offer', 'occational_offer_ratio', 'image')->where('occational_offer', 1)->where('publication_status', 1)->orderBy("id", "desc")->paginate(12);
        $data['sliders']                          =   Slider::select(["id", "active", "slider_image"])->where('location', 'category')->get(); 
        
        SEOMeta::addMeta('title', 'Halal Ghor - '.$data['occational_offer_title']->occational_offer_title );
        SEOMeta::setDescription($this->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($this->description);
        OpenGraph::setTitle($data['occational_offer_title']->occational_offer_title );
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');

        return view('front.occation.occational-offer', $data);
    }

    public function showPerfumePrice($id, $val)
    {

        $price      =   Product::select($val)->where('id', $id)->first();
        $product    =   Product::find($id);
        if($product->category_id == 7 && $product->flash_sale == 1){
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->flash_sale_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->flash_sale_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->flash_sale_ratio) / 100)), 2, '.', '');
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->flash_sale_ratio) / 100)), 2, '.', '');
            }
        }
        elseif ($product->category_id == 7 && $product->daily_offer == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->daily_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->daily_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->daily_offer_ratio) / 100)), 2, '.', '');
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->daily_offer_ratio) / 100)), 2, '.', '');
            }
        }
        elseif ($product->category_id == 7 && $product->occational_offer == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->occational_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->occational_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->occational_offer_ratio) / 100)), 2, '.', '');
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->occational_offer_ratio) / 100)), 2, '.', '');
            }
        }
        elseif ($product->category_id == 7 && $product->mela == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->mela_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->mela_offer_ratio) / 100)), 2, '.', '');
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->mela_offer_ratio) / 100)), 2, '.', '');

            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->mela_offer_ratio) / 100)), 2, '.', '');
            }
        }
        elseif ($product->category_id == 7) {
            if($val == 'price_3')
            {
                $price  =   $product->price_3;
            }
            elseif($val == 'price_6')
            {
                $price  =   $product->price_6;
            }
            elseif($val == 'price_12')
            {
                $price  =   $product->price_12;
            }
            else {
                $price  =   $product->price_25;
            }
        }
        else{
            $price  =   0;
        }

        return response()->json((Double)$price);
    }
}
