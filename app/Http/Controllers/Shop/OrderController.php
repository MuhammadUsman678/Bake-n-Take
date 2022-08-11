<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function newOrders(){
        $orders=Order::withCount('shopProducts')->has('shopProducts')->get();
        return view('shop.orders.new-orders',compact('orders'));
    }
    public function dispatchedOrders(){
        $pendingOrders=Order::whereNotIn('status',['delivered','new'])->get();
        return view('admin.orders.pending-orders',compact('pendingOrders'));
    }

    public function completeOrders(){
        $completeOrders=Order::where('status','delivered')->get();
        return view('admin.orders.complete-orders',compact('completeOrders'));
    }

    public function orderDetail($id){
        $order=Order::with('shopProducts')->has('shopProducts')->find($id);
        return view('shop.orders.order-detail',compact('order'));
    }

    public function changeStatus($id){
        $order=Order::with('shopProducts')->has('shopProducts')->find($id);
        foreach($order->shopProducts as $row){
            $row->update(['status'=>'packed','status_change_date'=>now()]);
        }
        return redirect()->route('shop.order.detail',[$order->id]);
    }
}
