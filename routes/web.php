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

Route::get('test2',function(){
    $t1 = \Carbon\Carbon::parse('2022-09-14 14:10:52');
    if(\Carbon\Carbon::now()->greaterThan($t1)) return "hello";
    $t2 = \Carbon\Carbon::parse(now());
    $diff = $t1->diff($t2);
    // return \Carbon\Carbon::now()->addMinutes(10);
            dd($diff);
});
Auth::routes(['verify'=>true]);

Route::get('/mark-as-read/{id}', 'UserNotificationController@mark_as_read')->name('mark_as_read');
Route::get('/mark-as-all-read', 'UserNotificationController@mark_as_all_read')->name('mark_all_read');
Route::get('/notifications/{user}', 'UserNotificationController@see_all_notifications')->name('see_all_notifications');
Route::get('shop/notifications/{user}', 'UserNotificationController@see_all_notificationshop')->name('shop.see_all_notifications');



Route::get('files', 'FileController@index' );
Route::post('files', 'FileController@store')->name('file.store');
Route::get('files/existingFiles', 'FileController@existingFiles')->name('file.exists');
Route::post('files/remove', 'FileController@remvoeFile')->name('file.remove');




Route::get('/', 'HomeController@index')->name('home');
Route::get('/all_shop', 'FrontController@allshop');
Route::get('/aboutus', 'FrontController@aboutus');
Route::get('/shop_product/{id}', 'FrontController@shopproduct');
Route::get('shop/register','FrontController@shopregister');
Route::get('category/{slug}','FrontController@category')->name('front.category');
Route::get('categories','FrontController@categories')->name('front.categories');
Route::post('storeshop','FrontController@storeshop');
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
})->middleware('auth');


Route::get('search', 'FrontController@searchProducts')->name('front.search.products');
Route::get('single-product/{slug}', 'FrontController@singleProduct')->name('front.single.product');
Route::get('products', 'FrontController@allProducts')->name('front.all.products');




// Frontend
Route::group(['as'=>'front.','middleware' => ['auth']],function () {
   
    Route::post('product/add-to-cart','CartController@addToCart')->name('addToCart');
    Route::get('product/get-cart-items','CartController@getCartItems')->name('getCartItems');
    Route::get('product/remove-cart-item','CartController@removeCartItem')->name('removeCartItem');
    Route::get('product/increment-quantity','CartController@incrementQuantity')->name('incrementQuantity');
    Route::get('product/decrement-quantity','CartController@decrementQuantity')->name('decrementQuantity');
    Route::get('product/cart','CartController@cart')->name('cart');
    Route::get('product/cart/page','CartController@cartPage')->name('cart.page');

    Route::get('checkout','CheckOutController@checkout')->name('checkout');
    Route::post('confirm-order','CheckOutController@order')->name('order.confirm');


    Route::get('orders', 'AccountController@orders')->name('orders');
    Route::get('quotation/message/{id}', 'AccountController@quotationmessage');
    Route::get('front/chat/{id}', 'AccountController@getMessages');
    Route::get('myaccount', 'AccountController@myaccount');
    Route::post('updateregister', 'AccountController@updateregister')->name('updateregister');
    Route::get('quotation', 'AccountController@quotation')->name('quotation');
    Route::get('view-order/{uuid}', 'AccountController@viewOrder')->name('view.order');


    Route::get('product/{slug}','CartController@cart')->name('product.show');

    Route::get('product/review/{product_id}/{order_id}','FrontController@productReview')->name('product.review');
    Route::post('product/review/{product_id}/{order_id}','FrontController@productReviewStore')->name('product.review');

    Route::post('products','FrontController@allProducts')->name('rangeSearch');



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
Route::group(['prefix'=>'/admin','as'=>'admin.','middleware' => ['auth','isAdminUser']],function () {
    Route::get('/', 'Admin\AdminDashboard@dashboard');

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

    Route::get('/product-reviews','Admin\ProductReviewController@index')->name('product-review');
    Route::get('/product-fake-reviews','Admin\ProductReviewController@fakeReviews')->name('product-fake-review');
    Route::get('/product-reviews/status-change/{id}/{status}','Admin\ProductReviewController@changeStatus')->name('product.review.status-change');


    Route::get('/transactions','Admin\TransactionController@index')->name('transactions');

    Route::get('/orders/new','Admin\OrderController@newOrders')->name('orders.new');
    Route::get('/orders/pending','Admin\OrderController@pendingOrders')->name('orders.pending');
    Route::get('/orders/complete','Admin\OrderController@completeOrders')->name('orders.complete');
    Route::get('/orders/detail/{id}','Admin\OrderController@orderDetail')->name('order.detail');

    Route::get('/orders/changeStatus/{id}/{status}','Admin\OrderController@changeStatus')->name('order.changeStatus');

    Route::get('/orders/paid/{id}','Admin\OrderController@paid')->name('order.paid');
    Route::get('/managecomplain','Shop\ProductController@complain');
    Route::get('/report_buyer','Shop\ProductController@status_active');

});
 //end Admin Side   



 Route::group(['prefix'=>'/shop','as'=>'shop.','middleware' => ['auth','isShopUser']],function () {
    
  


    Route::get('/product','Shop\ProductController@index')->name('product.index');
    Route::get('/product/create','Shop\ProductController@create')->name('product.create');
    Route::post('/product','Shop\ProductController@store')->name('product.store');
    Route::get('/product/{id}','Shop\ProductController@edit')->name('product.edit');
    Route::post('/product/{id}','Shop\ProductController@update');
    Route::get('/product/delete/{id}','Shop\ProductController@destroy')->name('product.delete');
    Route::get('/dashboard', 'Shop\DashboardController@dashboard')->name('dashboard');
    Route::get('editprofile','shop\productController@editprofile');
    Route::get('reportbuyer','shop\productController@reportbuyer');
    Route::post('post/reportbuyer','shop\productController@postreportbuyer');
    Route::post('/updateprofile', 'Admin\AdminDashboard@updateprofile');

    Route::get('/orders','Shop\OrderController@Orders')->name('orders');
    Route::get('/orders/detail/{id}','Shop\OrderController@orderDetail')->name('order.detail');

    Route::post('/order/add-take-way-time/{id}','Shop\OrderController@addTakeWayTime')->name('add.take.time');


    Route::get('/orders/changeStatus/{id}/{status}','Shop\OrderController@changeStatus')->name('order.changeStatus');
   
Route::get('reject_quotation','Shop\RfqController@reject');
Route::get('accept_quotation','Shop\RfqController@accept');
Route::post('complete_quotation','Shop\RfqController@complete');
//Rfq
Route::get('/rfq', 'Shop\RfqController@index');
    // Shop Products Images
    Route::get('product/images/{id}', 'Shop\ProductController@images')->name('products.images');
    Route::post('product/images/upload/{id}', 'Shop\ProductController@uploadImages')->name('products.store');
    Route::get('product/existingImages/{id}', 'Shop\ProductController@existingImages')->name('products.exists');
    Route::post('product/image/remove', 'Shop\ProductController@remvoeImage')->name('products.remove');
    Route::get('/chat','ChatController@shopindex')->name('chat');
    Route::get('/chat/{id}','ChatController@shopchat');

    Route::get('chat/{id}','ChatController@userchat');

});
Route::get('/get-message','ChatController@getMessages');
Route::post('/chat/store/messages','ChatController@storeMessage');
    // Route::get('admin/sellers','Admin.AdminDashboard@seller');
    // Route::get('admin/nonverifiedcustomers','Admin.AdminDashboard@nonverified');
    Route::middleware(['verified','auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
Route::get('/request_quotation','HomeController@quotation');
Route::post('/quotation_post','HomeController@postquotation');
});


