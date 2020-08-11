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
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\URL;


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
        $data['top_categories']              =   Category::where('publication_status', 1)->orderBy("id", "desc")->take(3)->get();
        $data['category_products']           =   Category::with('products')->where('publication_status', 1)->orderBy('id', 'desc')->get();
        $data['top_sales']                   =   Product::with('comments')->where('top_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(6)->get();
        $data['flash_sales']                 =   Product::with('comments')->where('flash_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->take(12)->get();
        $data['occational_offer_title']      =   OccationalOffer::where('publication_status', 1)->first();
        $data['occational_offer_products']   =   Product::with('comments')->where('occational_offer', 1)->orderBy("id", "desc")->get();
        $data['feedbacks']                   =   Feedback::orderBy("id", "desc")->get();
        $data['daily_offer_title']           =   DailyOffer::where('publication_status', 1)->first();
        $data['mela']                        =   Mela::where('publication_status', 1)->first();

        SEOMeta::addMeta('title', "Halal Ghor - Halal Perfume, Book, Fashion & Food", 'name');
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['halalghor', 'halal ghor', 'HalalGhor', 'Halal Ghor', 'halal', 'Online Shopping']);
        SEOMeta::setCanonical('https://test.halalghor.com');

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setTitle('Halal Ghor - Halal Perfume, Book, Fashion & Food');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setUrl('https://test.halalghor.com');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('https://test.halalghor.com/front/images/home.PNG');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('author', 'Sohel Rana');


        return view('front.home.home', $data);
    }
    public function productDetails($slug)
    {
        $data['product']            =   Product::all()->where("slug", $slug)->first();
        $data['similar_products']   =   Category::with('products')->where('publication_status', 1)->where('id', $data['product']->category_id)->orderBy("id", "desc")->get();
        $data['comments']           =   Comment::where('product_id', $data['product']->id)->orderBy("id", "desc")->take(5)->get();
        $data['length']             =   count(Comment::where('product_id', $data['product']->id)->orderBy("id", "desc")->get());
        
        // SEOMeta::setTitle($data['product']->name);
        SEOMeta::addMeta('title', $data['product']->name);
        SEOMeta::setDescription($data['product']->description);
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription($data['product']->description);
        OpenGraph::setTitle($data['product']->name);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'product');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addImage('https://test.halalghor.com/'.$data['product']->image);
 

        return view('front.product.product-details', $data);
    }
    public function productCategory($slug)
    {
        $data['sliders'] = Slider::where('publication_status',1)->where('location', 'category')->get();
        $data['category_products']   =   Category::with('products')->where('publication_status', 1)->where('slug', $slug)->get();
        
        SEOMeta::addMeta('title', $data['category_products'][0]->category_name);
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setTitle($data['category_products'][0]->category_name);
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.product.product-category', $data);
    }
    public function showAllCategories()
    {
        $data['categories'] =   Category::where('publication_status', 1)->get();
        return view('front.category.all-categories', $data);
    }

    public function showConfirmation()
    {
        return view('front.thank-you.thank-you')->with('message', 'আসসালামু আলাইকুম , আপনার অর্ডারটি সম্পন্ন হয়েছে। খুব তারাতাড়ি আপনার সাথে যোগাযোগ করা হবে ইনশাআল্লাহ্‌  !!!');
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
        $data['sliders']        =   Slider::where('publication_status',1)->where('location', 'category')->get();
        $data['flash_sales']    =   Product::where('flash_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->get();
        
        SEOMeta::addMeta('title', 'HalalGhor - Flash Sale');
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
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
        $data['sliders']        =   Slider::where('publication_status',1)->where('location', 'category')->get();
        $data['top_sales']      =   Product::where('top_sale', 1)->where('publication_status', 1)->orderBy("id", "desc")->get();
        
        SEOMeta::addMeta('title', 'HalalGhor - Top Sale');
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setTitle('HalalGhor - Top Sale');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        // OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.top-sale.top-sale', $data);
    }
    public function todaysOffer()
    {
        $data['daily_offer_products']        =   Product::where('daily_offer', 1)->get();
        $data['sliders']                     =   Slider::where('publication_status',1)->where('location', 'category')->get();
        
        SEOMeta::addMeta('title', 'HalalGhor - Daily Offer');
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setTitle('HalalGhor - Daily Offer');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        // OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.daily-offer.daily-offer', $data);
    }
    public function mela()
    {
        $data['melar_products']              =   Product::where('mela', 1)->get();
        $data['sliders']                     =   Slider::where('publication_status',1)->where('location', 'category')->get();
        
        SEOMeta::addMeta('title', 'HalalGhor - Mela');
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setTitle('HalalGhor - Mela');
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        // OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.mela.mela', $data);
    }
    public function occationalOffer()
    {
        $data['occational_offer_title']           =   OccationalOffer::where('publication_status', 1)->find(1);
        $data['occational_offer_products']        =   Product::where('occational_offer', 1)->get();
        $data['sliders']                          =   Slider::where('publication_status',1)->where('location', 'category')->get();
        
        SEOMeta::addMeta('title', 'Halal Ghor - '.$data['occational_offer_title']->occational_offer_title );
        SEOMeta::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        SEOMeta::addKeyword(['Honey', 'Perfume', 'Grocery', 'Islamic Product', 'Islamic Book', 'Online Shopping']);

        OpenGraph::addProperty('fb:app_id', '345891736236545');
        OpenGraph::setDescription('আসসালামুআলাইকুম ওয়ারহমাতুল্লাহি ওয়াবারাকাতুহু। halalghor.com হালাল ঘর ডট কম একটি ইকমার্স সাইট, যেখানে ইসলামিক প্রায় সকল ধরনের হালাল পণ্য সামগ্রী বিক্রয় করা হয়। যেমনঃ হালাল ফুড, হালাল পারফিউম, ইসলামিক বই এছাড়াও একটি পরিবারের জন্য প্রয়োজনীয় হালাল পণ্যসামগ্রী যেমনঃ মুসলিম ছেলেদের ফ্যাশান, মুসলিম বোনদের ফ্যাশান, গৃহসজ্জা, গ্যাজেট ইত্যাদি অতন্ত্য স্বল্প মূল্যে বিক্রয় করা হয়।');
        OpenGraph::setTitle($data['occational_offer_title']->occational_offer_title );
        OpenGraph::setUrl(URL::current());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('site_name', 'Halal Ghor');
        // OpenGraph::addImage('https://test.halalghor.com/'.$data['category_products'][0]->category_image);

        return view('front.occation.occational-offer', $data);
    }

    public function showPerfumePrice($id, $val)
    {

        $price      =   Product::select($val)->where('id', $id)->first();
        $product    =   Product::find($id);
        if($product->category_id == 7 && $product->flash_sale == 1){
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->flash_sale_ratio) / 100)), 2);
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->flash_sale_ratio) / 100)), 2);
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->flash_sale_ratio) / 100)), 2);
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->flash_sale_ratio) / 100)), 2);
            }
        }
        elseif ($product->category_id == 7 && $product->daily_offer == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->daily_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->daily_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->daily_offer_ratio) / 100)), 2);
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->daily_offer_ratio) / 100)), 2);
            }
        }
        elseif ($product->category_id == 7 && $product->occational_offer == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->occational_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->occational_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->occational_offer_ratio) / 100)), 2);
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->occational_offer_ratio) / 100)), 2);
            }
        }
        elseif ($product->category_id == 7 && $product->mela == 1) {
            if($val == 'price_3')
            {
                $price  =   number_format(($product->price_3 - (($product->price_3 * $product->mela_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_6')
            {
                $price  =   number_format(($product->price_6 - (($product->price_6 * $product->mela_offer_ratio) / 100)), 2);
            }
            elseif($val == 'price_12')
            {
                $price  =   number_format(($product->price_12 - (($product->price_12 * $product->mela_offer_ratio) / 100)), 2);
            }
            else {
                $price  =   number_format(($product->price_25 - (($product->price_25 * $product->mela_offer_ratio) / 100)), 2);
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
        return response()->json((Int)$price);
    }
}
