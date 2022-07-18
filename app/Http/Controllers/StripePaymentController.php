<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try{
            $cartItems=Cart::with('product:id,price')->where('user_id',(auth()->user()->id))->get();
            $total_price=0;
            $pivot_data=[];
            foreach($cartItems as $key=>$cart){
                $pivot_data[$key]['quantity']=$cart->quantity;
                $pivot_data[$key]['product_id']=$cart->product->id;
                $total_price +=$cart->quantity*$cart->product->price;
            }
            $price=$total_price;
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $price * 100,
                    "currency" => "pkr",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from bakentake.com." 
            ]);
            return response()->json(['success'=>'Payment successful!']);
        
        }catch(\Exception $e){
            info($e->getMessage());
            return response()->json(['error'=>'Payment Not successful!']);
        }catch(\Throwable $e){
            info($e->getMessage());
            return response()->json(['error'=>'Payment Not successful!']);
        }
    }
}
