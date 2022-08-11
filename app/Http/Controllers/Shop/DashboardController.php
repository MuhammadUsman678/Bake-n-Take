<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $totalOrder=Order::has('shopProducts')->count();
        return view('shop.dashboard',compact('totalOrder'));
    }
}
