<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\quotation_detail;
use App\quotation;
use App\ShopProduct;
use App\shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RfqController extends Controller
{
  public function index(){
    $shop=shop::where('user_id',auth()->user()->id)->first();
    $product = ShopProduct::with('category')->where('shop_id',$shop->id)->latest()->get();
    
   $detail=quotation_detail::with('quotation')->where('shop_id',$shop->id)->get();
 
    return view('shop.rfq.index',compact('detail','product'));
  }
  public function reject(Request $request){
    $delete=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->first();

    $delete->delete();
    return response()->json(['success'=>'Quotation Rejected']);
  }
  public function accept(Request $request){
    $delete=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id','!=',$request->shopid)->delete();
    $update=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->update([
      'status'=>1,
    ]);
    $quotation=quotation::find($request->quotationid);
    $quotation->update([
      'status'=>1,
    ]);

    return response()->json(['success'=>'Quotation Accepted and now in progress']);
  }
  public function complete(Request $request){
      $update=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->update([
        'status'=>2,
      ]);
      $quotation=quotation::find($request->quotationid);
      $quotation->update([
        'status'=>2,
      ]);
      $user=User::find($quotation->user_id);
      // dd($quotation);
      $lastOrder=Order::where('user_id',$user->id)->latest()->first();
      if($lastOrder){
          $country=$lastOrder->country;
          $city=$lastOrder->city;
          $state=$lastOrder->state;
          $street=$lastOrder->street;
          $post_code=$lastOrder->post_code;
          $phone=$lastOrder->phone;
      }else{
        $country='Pakistan';
        $city='Gujranwala';
        $state='punjab';
        $street='Null';
        $post_code=123456;
        $phone='+92305000000';
      }

      $date=Carbon::parse($quotation->date)->format('Y-m-d\TH:i');
     

      $order_number=(string) Str::uuid();
      $values = array(
        'sub_total'   => $request->price,
        'total_amount' => $request->price,
         'adminamount' => $request->price*5/100,
        'description' => 'Stripe',
        'status' 	  => 'new',
        'delivery_date'=> $date?? now(),
        'payment_status' 	  => 'unpaid',
        'full_name'   =>$user->name?? '',
        'country'     =>$country?? '',
        'city'        =>$city?? '',
        'state'       =>$state?? '',
        'street'      =>$street?? '',
        'post_code'   =>$post_code?? '',
        'phone'       =>$phone?? '',
        'email'       =>$user->email?? '',
        'payment_method'      =>'cash_on_delivery',
        'user_id'      =>$user->id,
        'order_number'      =>$order_number,
      );
      $order=Order::create($values);
      OrderProduct::create([
        'quantity'=>1,
        'product_id'=>$request->product,
        'price'=>$request->price,
        'order_id'=>$order->id,
        'status'=>'new'
      ]);

    return back()->with(['success'=>'congratulation on completed your order']);
  }
}
