<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\shop;
use App\quotation_detail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $shop=shop::where('user_id',\Auth::user()->id)->first();
       
        $totalOrder=Order::has('shopProducts')->count();
        $rfq=quotation_detail::where('shop_id',$shop->id)->where('status',2)->count();
        return view('shop.dashboard',compact('totalOrder','rfq'));
    }
}
