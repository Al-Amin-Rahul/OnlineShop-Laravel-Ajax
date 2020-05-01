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
    Route::get('product-details/{id}', 'HomeController@productDetails')->name('product-details');
    Route::get('product-category/{id}', 'HomeController@productCategory')->name('product-category');
    Route::get('all-categories', 'HomeController@showAllCategories')->name('all-categories');
    Route::get('login/user', 'HomeController@showuserLoginForm')->name('login/user');

    Route::post('buy-now', 'CartController@buyNow')->name('buy-now');

    Route::post('add-to-cart', 'CartController@store')->name('add-to-cart');
    Route::post('remove-cart', 'CartController@remove')->name('remove-cart');
    Route::get('show-cart', 'CartController@cartShow')->name('show-cart');

    Route::get('order-confirmation', 'HomeController@showConfirmation')->name('order-confirmation');
    Route::post('track-order', 'HomeController@showOrder')->name('track-order');

    Route::post('search/products', 'SearchController@searchProducts')->name('search/products');
    Route::post('productList', 'SearchController@Products')->name('productList');

    Route::post('comment/store', 'CommentController@store')->name('comment.store');
    Route::get('show-comment/{id}', 'CommentController@show')->name('show-comment');
});

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard')->middleware('auth');

Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resource('users', 'DashboardController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('slider', 'SliderController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('order', 'OrderController');
    Route::get('set-flash-sale-timer', 'DashboardController@setFlashSaleTime')->name('set-flash-sale-timer');
});

Auth::routes();

Route::fallback(function(){
    return view('front.404.404');
});