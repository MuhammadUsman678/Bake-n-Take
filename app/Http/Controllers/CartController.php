<?php

namespace App\Http\Controllers;

use App\Cart;
use App\ShopProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        $cart=Cart::with('product')->where('user_id',(auth()->user()->id))->get();
        return view('cart',compact('cart'));
    }
    public function incrementQuantity(Request $request){
        $cart=Cart::find($request->cart_id)->increment('quantity');
        return response()->json(['data'=>null],200);
    }

    public function decrementQuantity(Request $request){
        $cart=Cart::find($request->cart_id)->decrement('quantity');
        return response()->json(['data'=>null],200);
    }

    public function addToCart(Request $request){
        $product=ShopProduct::with('carts')->find($request->product_id);
        if($product){
            if($product->carts && $product->carts->user_id===auth()->user()->id){
                $product->carts->increment('quantity');
            }else{
                $add=Cart::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$product->id,
                    'quantity'=>1,
                ]);
            }
            return response()->json(['data'=>null],200);
        }
        return response()->json(['data'=>null],500);
    }

    public function getCartItems(){
        $cartItems=Cart::with('product')->where('user_id',(auth()->user()->id))->get();
        $data=[];
        foreach($cartItems as $key=>$cart){
            $data[$key]['name']=$cart->product->product_name;
            $data[$key]['quantity']=$cart->quantity;
            $data[$key]['price']=$cart->product->price;
            $data[$key]['image']=$cart->product->getFirstMediaUrl('images','thumb') ? $cart->product->getFirstMediaUrl('images','thumb') : 'https://via.placeholder.com/60?text=No+Image+Found';
        }
        return response()->json(['data'=>$data],200);
    }

    public function removeCartItem(Request $request){
        $cart=Cart::find($request->cart_id)->delete();
        return response()->json(['data'=>null],200);
    }
}
