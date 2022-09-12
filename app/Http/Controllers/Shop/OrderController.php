<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Shop;
use App\Shopproduct;
use App\OrderProduct;

class OrderController extends Controller
{
    public function Orders(){
        // return auth()->user()->shop;
        $orders=Order::with('products')->has('products')->get();
        return view('shop.orders.new-orders',compact('orders'));
    }

    public function orderDetail($id){
        $order=Order::with('products')->has('products')->find($id);
        return view('shop.orders.order-detail',compact('order'));
    }

    public function changeStatus($id,$status){
    $myshop=shop::where('user_id',auth()->user()->id)->first();
    $product=ShopProduct::where('shop_id',$myshop->id)->get();
    $order=Order::find($id);
    foreach($product as $p){
        $shop=OrderProduct::where('order_id',$order->id)->where('product_id',$p->id)->first();
        if($shop){
            $shop->update(['status'=>$status,'status_change_date'=>now()]);
        }   
    }
        return redirect()->route('shop.order.detail',[$order->id]);
    }
}
