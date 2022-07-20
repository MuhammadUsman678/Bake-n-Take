<?php

use App\Cart;
use App\Http\Controllers\Admin\AdminDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------s
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify'=>true]);

Route::get('/mark-as-read/{id}', 'UserNotificationController@mark_as_read')->name('mark_as_read');
Route::get('/mark-as-all-read', 'UserNotificationController@mark_as_all_read')->name('mark_all_read');
Route::get('/notifications/{user}', 'UserNotificationController@see_all_notifications')->name('see_all_notifications');



Route::get('files', 'FileController@index' );
Route::post('files', 'FileController@store')->name('file.store');
Route::get('files/existingFiles', 'FileController@existingFiles')->name('file.exists');
Route::post('files/remove', 'FileController@remvoeFile')->name('file.remove');




Route::get('/', 'HomeController@index');
Route::get('/all_shop', 'FrontController@allshop');
Route::get('/shop_product/{id}', 'FrontController@shopproduct');
Route::get('shop/register','FrontController@shopregister');
Route::get('category/{slug}','FrontController@category')->name('front.category');
Route::get('categories','FrontController@categories')->name('front.categories');
Route::post('storeshop','FrontController@storeshop');
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
})->middleware('auth');


// Frontend
Route::group(['as'=>'front.','middleware' => ['auth']],function () {
   
    Route::post('product/add-to-cart','CartController@addToCart')->name('addToCart');
    Route::get('product/get-cart-items','CartController@getCartItems')->name('getCartItems');
    Route::get('product/remove-cart-item','CartController@removeCartItem')->name('removeCartItem');
    Route::get('product/increment-quantity','CartController@incrementQuantity')->name('incrementQuantity');
    Route::get('product/decrement-quantity','CartController@decrementQuantity')->name('decrementQuantity');
    Route::get('product/cart','CartController@cart')->name('cart');

    Route::get('checkout','CheckOutController@checkout')->name('checkout');
    Route::post('confirm-order','CheckOutController@order')->name('order.confirm');
    Route::get('search', 'FrontController@searchProducts')->name('search.products');
    Route::get('product', 'FrontController@singleProduct')->name('single.product');


    Route::get('orders', 'AccountController@orders')->name('orders');
    Route::get('view-order/{uuid}', 'AccountController@viewOrder')->name('view.order');


    Route::get('product/{slug}','CartController@cart')->name('product.show');



});

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::post('/paymentStatus','CheckOutController@paymentStatus');



Route::get('test',function(){
   $order=\App\Order::with('products')->latest()->first();
//    return $order->products->sum('quantity');
    return $order;
});





//Admin Side
Route::group(['prefix'=>'/admin','as'=>'admin.','middleware' => ['auth']],function () {
    Route::get('/dashboard', 'Admin\AdminDashboard@dashboard')->name('dashboard');
    Route::get('/pendingapproved', 'Admin\AdminDashboard@pendingapproved');
    Route::get('/editprofile', 'Admin\AdminDashboard@editprofile');
    Route::post('/updateprofile', 'Admin\AdminDashboard@updateprofile');
    Route::get('/approvedshop', 'Admin\AdminDashboard@approvedshop');
    Route::get('/delete_shop', 'Admin\AdminDashboard@delete_shop');
    Route::get('/shop_status_active', 'Admin\AdminDashboard@status_active');
    Route::get('/category','Admin\CategoryController@index')->name('category');
    Route::get('/category/create','Admin\CategoryController@create')->name('category.create');
    Route::post('/category','Admin\CategoryController@store')->name('category.store');
    Route::get('/category/{id}','Admin\CategoryController@edit')->name('category.edit');
    Route::post('/category_update/{id}','Admin\CategoryController@update');
    Route::get('/category/delete/{id}','Admin\CategoryController@destroy')->name('category.delete');
//Chat Api
    Route::get('/chat','ChatController@index')->name('chat');
    Route::get('/chat/{id}','ChatController@chat');
});
 //end Admin Side   



 Route::group(['prefix'=>'/shop','as'=>'shop.','middleware' => ['auth']],function () {
    Route::get('/product','Shop\ProductController@index')->name('product.index');
    Route::get('/product/create','Shop\ProductController@create')->name('product.create');
    Route::post('/product','Shop\ProductController@store')->name('product.store');
    Route::get('/product/{id}','Shop\ProductController@edit')->name('product.edit');
    Route::post('/product/{id}','Shop\ProductController@update');
    Route::get('/product/delete/{id}','Shop\ProductController@destroy')->name('product.delete');
    Route::view('/dashboard', 'shop.dashboard')->name('dashboard');

    // Shop Products Images
    Route::get('product/images/{id}', 'Shop\ProductController@images')->name('products.images');
    Route::post('product/images/upload/{id}', 'Shop\ProductController@uploadImages')->name('products.store');
    Route::get('product/existingImages/{id}', 'Shop\ProductController@existingImages')->name('products.exists');
    Route::post('product/image/remove', 'Shop\ProductController@remvoeImage')->name('products.remove');
    Route::get('/chat','ChatController@shopindex')->name('chat');
    Route::get('/chat/{id}','ChatController@shopchat');

});
Route::get('/get-message','ChatController@getMessages');
Route::post('/chat/store/messages','ChatController@storeMessage');
    // Route::get('admin/sellers','Admin.AdminDashboard@seller');
    // Route::get('admin/nonverifiedcustomers','Admin.AdminDashboard@nonverified');
    Route::middleware(['verified','auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
Route::get('/request_quotation','HomeController@quotation');
});


