<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\UserNotificationController;
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

Route::get('/', function () { 
    return view('index');
});
Route::get('shop/register','FrontController@shopregister');
Route::post('storeshop','FrontController@storeshop');
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
})->middleware('auth');



//Admin Side
Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'Admin\AdminDashboard@dashboard')->name('admin.dashboard');
    Route::get('/pendingapproved', 'Admin\AdminDashboard@pendingapproved');
    Route::get('/approvedshop', 'Admin\AdminDashboard@approvedshop');
    Route::get('/delete_shop', 'Admin\AdminDashboard@delete_shop');
    Route::get('/shop_status_active', 'Admin\AdminDashboard@status_active');
});
 //end Admin Side   




    Route::get('/shop/dashboard', function () {
        return view('shop.dashboard');
    })->name('shop.dashboard');
    // Route::get('admin/sellers','Admin.AdminDashboard@seller');
    // Route::get('admin/nonverifiedcustomers','Admin.AdminDashboard@nonverified');
    Route::middleware(['verified','auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


