<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Front')->group(function(){
    Route::get('/', 'HomeController@index')->name('/');
    Route::resource('checkout', 'CheckoutController')->middleware('checkout');
    Route::get('product-details/{slug}', 'HomeController@productDetails')->name('product-details');
    Route::get('product-category/{slug}', 'HomeController@productCategory')->name('product-category');
    Route::get('all-categories', 'HomeController@showAllCategories')->name('all-categories');

    Route::get('login', 'HomeController@showuserLoginForm')->name('login');
    Route::post('new-customer', 'CustomerController@saveCustomer')->name('new-customer');
    Route::get('customer-logout', 'CustomerController@customerLogout')->name('customer-logout');
    Route::post('guest-login', 'CustomerController@guestLogin')->name('guest-login');
    Route::post('customer-login', 'CustomerController@customerLogin')->name('customer-login');

    Route::get('flash-sale', 'HomeController@flashSale')->name('flash-sale');
    Route::get('top-sale', 'HomeController@topSale')->name('top-sale');
    Route::get('todays-offer', 'HomeController@todaysOffer')->name('todays-offer');
    Route::get('mela', 'HomeController@mela')->name('mela');
    Route::get('occational-offer', 'HomeController@occationalOffer')->name('occational-offer');

    Route::post('buy-now', 'CartController@buyNow')->name('buy-now');

    Route::post('add-to-cart', 'CartController@store')->name('add-to-cart');
    Route::post('remove-cart', 'CartController@remove')->name('remove-cart');
    Route::get('show-cart', 'CartController@cartShow')->name('show-cart');
    Route::post('cart-update', 'CartController@cartUpdate')->name('cart-update');

    Route::post('apply-coupon', 'CheckoutController@applyCoupon')->name('apply-coupon');

    Route::get('show-perfume-price/{id}/{val}', 'HomeController@showPerfumePrice')->name('show-perfume-price');

    Route::get('order-confirmation', 'HomeController@showConfirmation')->name('order-confirmation');
    Route::post('track-order', 'HomeController@showOrder')->name('track-order');

    Route::post('comment/store', 'CommentController@store')->name('comment.store');
    Route::get('show-comment/{id}', 'CommentController@show')->name('show-comment');

    // info
    Route::get('about-us', 'InfoController@about')->name('about-us');
    Route::get('contact-us', 'InfoController@contact')->name('contact-us');
    Route::get('how-to-buy', 'InfoController@howToBuy')->name('how-to-buy');
    Route::get('security-policy', 'InfoController@securityPolicy')->name('security-policy');
    Route::get('shipping-and-replacement', 'InfoController@shippingAndReplacement')->name('shipping-and-replacement');
    Route::get('privacy-policy', 'InfoController@privacyPolicy')->name('privacy-policy');
    Route::get('terms-of-use', 'InfoController@termsOfUse')->name('terms-of-use');
    Route::get('my-account', 'InfoController@MyAccount')->name('my-account');
    Route::get('developer-info', 'InfoController@developerInfo')->name("developer-info");
    Route::get('reminder/{id}', 'InfoController@reminder')->name("reminder");
    Route::post('save-reminder', 'InfoController@saveReminder')->name("save-reminder");
    Route::post('save-feedback', 'InfoController@saveFeedback')->name("save-feedback");
    Route::get('feedback', 'InfoController@feedback')->name("feedback");
});

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('show-perfume-field/{val}', 'Admin\DashboardController@showPerfumeField')->name('show-perfume-field');

Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resource('users', 'DashboardController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('slider', 'SliderController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('occation', 'OccationController');
    Route::resource('comment', 'CommentController');
    Route::resource('order', 'OrderController');
    Route::resource('coupon', 'CouponController');
    Route::resource('mela', 'MelaController');
    Route::resource('feedback', 'FeedbackController');
    Route::post('order-status', 'DashboardController@orderStatus')->name('order-status');
    Route::get('customer-feedback', 'DashboardController@customerFeedback')->name('customer-feedback');
});

Auth::routes();

Route::fallback(function(){
    return view('front.404.404');
});