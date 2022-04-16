<?php

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

Route::get('/', function () { 
    return view('index');
});
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
})->middleware('auth');
Route::middleware(['verified','auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/shop/dashboard', function () {
        return view('shop.dashboard');
    })->name('shop.dashboard');
    
    
    Route::get('/home', 'HomeController@index')->name('home');
});

