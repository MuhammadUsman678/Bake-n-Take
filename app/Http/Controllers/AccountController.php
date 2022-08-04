<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function orders(Request $request){
        $orders=\App\Order::with('products')->where('user_id',auth()->user()->id)->get();
        return view('account.orders',compact('orders'));
    }

    public function viewOrder($uuid){
        $order=\App\Order::with('products')->where('order_number',$uuid)->first();
        $data=[];
        foreach($order->products as $key=>$row){
            $data[$key]['name']=$row->productDetails->product_name;
            $data[$key]['quantity']=$row->quantity;
            $data[$key]['product_id']=$row->productDetails->id;
            $data[$key]['price']=$row->productDetails->price;
            $data[$key]['slug']=$row->productDetails->slug;
            $data[$key]['image']=$row->productDetails->getFirstMediaUrl('images','thumb') ? $row->productDetails->getFirstMediaUrl('images','thumb') : 'https://via.placeholder.com/60?text=No+Image+Found';
        }
        $products= $data;
        return view('account.view-order',compact('order','products'));
    }
}
