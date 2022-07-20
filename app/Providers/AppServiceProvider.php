<?php

namespace App\Providers;

use App\Category;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //compose all the views....
        view()->composer('*', function ($view) 
        {
            $cartItems=0;
           
            if (Auth::check()) {
                $cartItems=\App\Cart::where('user_id',(auth()->user()->id))->sum('quantity');
            }
            $productCategories= Category::where(['status' => 1])->whereHas('product')->get()->take(7);
            //...with this variable
            $view->with(['cartItems'=>$cartItems,'productCategories'=>$productCategories]);    
        });  

    }
}
