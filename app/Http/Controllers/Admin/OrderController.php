<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function newOrders(){
        $newOrders=Order::where('status','new')->get();
        return view('admin.orders.new-orders',compact('newOrders'));
    }
    public function pendingOrders(){
        $pendingOrders=Order::whereNotIn('status',['delivered','new'])->get();
        return view('admin.orders.pending-orders',compact('pendingOrders'));
    }

    public function completeOrders(){
        $completeOrders=Order::where('status','delivered')->get();
        return view('admin.orders.complete-orders',compact('completeOrders'));
    }

    public function orderDetail($id){
        $order=Order::with('products')->find($id);
        // return $order;
        return view('admin.orders.order-detail',compact('order'));
    }
}
