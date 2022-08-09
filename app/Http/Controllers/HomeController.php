<?php

namespace App\Http\Controllers;

use App\ShopProduct;
use App\Category;
use Illuminate\Http\Request;
use App\quotation;
use App\quotation_detail;
use App\shop;
class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=ShopProduct::with('category:id,category_name','rating')->where('status',1)->get();
        $top_rated=$products->filter(function($q){
            return $q->rating->sum('rating') > 3;
        });
        return view('index',compact('products','top_rated'));
    }
    public function quotation()
    {
        $category=Category::get();
        $shop=shop::get();
        return view('quotation_request',compact('category','shop'));
    }
    public function postquotation(Request $request){
        $quotation=quotation::create([
            'user_id'=>auth()->user()->id,
            'name'=>$request->productname,
            'category'=>$request->category,
            'price'=>$request->price,
            'description'=>$request->description,
            'date'=>$request->date,

        ]);
        for ($i=0;$i<count($request->shop);$i++){
            quotation_detail::create([
                'quotation_id'=>$quotation->id,
            'shop_id'=>$request->shop[$i],
            ]);
        }
        return back();
    }
}
