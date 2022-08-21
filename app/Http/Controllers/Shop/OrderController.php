<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function Orders(){
        $orders=Order::with('shopProducts')->has('shopProducts')->get();
        // return $orders;
        return view('shop.orders.new-orders',compact('orders'));
    }

    public function orderDetail($id){
        $order=Order::with('shopProducts')->has('shopProducts')->find($id);
        return view('shop.orders.order-detail',compact('order'));
    }

    public function changeStatus($id,$status){
        $order=Order::with('shopProducts')->has('shopProducts')->find($id);
        foreach($order->shopProducts as $row){
            $row->update(['status'=>$status,'status_change_date'=>now()]);
        }
        return redirect()->route('shop.order.detail',[$order->id]);
    }
}
