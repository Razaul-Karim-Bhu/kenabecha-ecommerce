<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//Frontend Routes
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/product/detail/{id}', 'FrontendController@product_detail')->name('product_detail');
Route::get('/shop/view', 'FrontendController@shop_page_view')->name('shop_page_view');
Route::get('/show/product/by/category/{id}', 'FrontendController@product_show_by_category')->name('product_show_by_category');

//Auth Routes
Auth::routes(['verify' => true]);


//Cart Routes
Route::post('/add/to/cart/', 'CartController@add_to_cart')->name('add_to_cart');
Route::get('/remove/from/cart/{id}', 'CartController@remove_cart')->name('remove_cart');
Route::post('/cart/update/', 'CartController@cart_update')->name('cart_update');

//Checkout Routes
Route::get('/checkout/customer/', 'CheckoutController@checkout_form')->name('checkout_form')->middleware('CustomerLogin');
Route::post('/checkout/customer/', 'CheckoutController@customer_sign_up')->name('customer_sign_up');
Route::get('/checkout/shipping/', 'CheckoutController@shipping')->name('shipping')->middleware('CustomerNotLoginCheck');
Route::post('checkout/shipping', 'CheckoutController@shipping_info_save')->name('shipping_info_save');
Route::get('checkout/payment', 'CheckoutController@payment')->name('payment')->middleware('ShippingIdCheck', 'CustomerNotLoginCheck');
Route::post('checkout/order/save', 'CheckoutController@order_save')->name('order_save');
Route::get('logout/customer', 'CheckoutController@logout_customer')->name('logout_customer');
Route::post('/customer/login/', 'CheckoutController@customer_login')->name('customer_login');

//Order Routes
Route::get('order/manage', 'OrderController@order_manage')->name('order_manage');
Route::get('order/details/{id}', 'OrderController@order_details')->name('order_details');
Route::get('order/invoice/{id}', 'OrderController@order_invoice')->name('order_invoice');
Route::get('order/invoice/download/{id}', 'OrderController@order_invoice_download')->name('order_invoice_download');
Route::get('order/delete/{id}', 'OrderController@order_delete')->name('order_delete');


//MiddleWare Route
Route::group(['middleware' => ['AuthCheck']], function () {
    //Dashboard Routes
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    //Categroy routes
    Route::get('/category/add', 'CategoryController@category_add')->name('category_add');
    Route::post('/category/add/post', 'CategoryController@category_add_post')->name('category_add_post');
    Route::get('/category/manage', 'CategoryController@category_manage')->name('category_manage')->middleware('AuthCheck');
    Route::get('/category/edit/{id}', 'CategoryController@category_edit')->name('category_edit');
    Route::post('/category/edit/post', 'CategoryController@category_edit_post')->name('category_edit_post');
    Route::get('/category/publish/{id}', 'CategoryController@category_publish')->name('category_publish');
    Route::get('/category/unpublish/{id}', 'CategoryController@category_unpublish')->name('category_unpublish');
    Route::get('/category/delete/{id}', 'CategoryController@category_delete')->name('category_delete');

    //Product Routes
    Route::get('/product/add', 'ProductController@product_add')->name('product_add');
    Route::post('/product/save', 'ProductController@product_save')->name('product_save');
    Route::get('/product/manage', 'ProductController@product_manage')->name('product_manage');
    Route::get('/product/unpublish/{id}', 'ProductController@unpublished_product')->name('unpublished_product');
    Route::get('/product/publish/{id}', 'ProductController@published_product')->name('published_product');
    Route::get('/product/delete/{id}', 'ProductController@product_delete')->name('product_delete');
    Route::get('/product/edit/{id}', 'ProductController@product_edit')->name('product_edit');
    Route::post('/product/update', 'ProductController@product_update')->name('product_update');
    Route::get('/product/restore/{id}', 'ProductController@product_restore')->name('product_restore');
    Route::get('/product/destroy/{id}', 'ProductController@product_destroy')->name('product_destroy');
});
