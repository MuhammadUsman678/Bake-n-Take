<?php

namespace App\Http\Controllers;

use App\ShopProduct;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=ShopProduct::with('category:id,category_name')->where('status',1)->get();
        return view('index',compact('products'));
    }
    public function quotation()
    {
        $category=Category::get();
        return view('quotation_request',compact('category'));
    }
}
