<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\newusernotification;
use App\User;
use App\shop;
use App\notification_user;
use App\Mail\registermail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Alert;
use App\Demo;
use App\Order;
use App\ProductReview;
use App\ShopProduct;
use Str;

class FrontController extends Controller
{
    public function shopregister(){
        return view('auth.shopregister');
    }
    public function storeshop(Request $request){
        if ($request->hasfile('shopimg'))
        {
        $shopimage=$request->file('shopimg');
        $shopName = $shopimage->getClientOriginalName();
       
        $shopimage->move('shopdocument',$shopName);
        }else{
            $shopName=null;   
        }
      $user=User::create([
       'name'=>$request->name,
       'email'=>$request->email,
       'role_id'=>3,
       'password'=>Hash::make($request->password),
       'status'=>0,
       'image'=>$shopName,
       ]);
       if ($request->hasfile('file'))
        {
        $image=$request->file('file');
        $imageName = $image->getClientOriginalName();
       
        $image->move('shopdocument',$imageName);
        }else{
            $imageName=null;   
        }
       
       $shop=shop::create([
    'user_id'=>$user->id,
    'shop_name'=>$request->shopname,
    'city'=>'gujranwala',
    'address'=>$request->address,
    'phone'=>$request->phoneno,
    'ntn_no'=>$request->ntnno,
    'cnic_no'=>$request->cnic,
    'document'=>$imageName,
    
    
       ]);
       $maildetail=[
        'username'=>$user->name,
        'shop_name'=>$shop->shopname,
       ];
       \Mail::to($user->email)->send(new registermail($maildetail));
        //    $user->notify(new newusernotification($user));
    $details =$user->name.' Requested for new sh0p registeration';

    $user2=User::where('role_id','1')->get();
            foreach($user2 as $row)
            {
                $this->userNotify($row->id,$details);
            }

       return back()->with('success','Your shop request is submitted our team contact for furthure detais');
    }
    function userNotify($id,$details)
    {
        $notify = new notification_user();
        $notify->user_id =$id;
        $notify->data = $details;
        $notify->save();
    }
    public function aboutus(){
    
        return view('aboutus');
    }


    public function category($slug){
        $category=Category::where('slug',$slug)->where('status',1)->whereHas('product')->first();
        return view('categories',compact('category'));
    }

    public function categories(){
        $categories=Category::where('status',1)->get();
        return $categories;
    }

    public function searchProducts(Request $request){
        if ($request->key == null) {
            $products = null;
        } else {
            $products = ShopProduct::where('status',1)->where('product_name', 'LIKE', "%{$request->key}%")->get();
        }


        $search = collect();


        if ($products == null) {
            return response(['data' => $search], 200);
        } else {
            if ($products->count() > 0) {
                foreach ($products as $item) {
                    $demo = new Demo();
                    $demo->title = Str::limit($item->product_name, 58);
                    $demo->image = $item->getFirstMediaUrl('images','thumb') ? $item->getFirstMediaUrl('images','thumb') : 'https://via.placeholder.com/60?text=No+Image+Found';
                    $demo->link = route('front.single.product', $item->slug);
                    $search->push($demo);
                }

            } else {
                $demo = new Demo();
                $demo->title = 'No product Found';
                $demo->image = null;
                $demo->link = null;
                $search->push($demo);
            }
        }
        return response(['data' => $search], 200);
    }
    public function allshop(){
        $shop=shop::where('status',1)->whereHas('user')->get();
      return view('allshop',compact('shop'));
    }
    public function shopproduct($id){
        $shop=shop::findorfail($id);
        $shopproduct=ShopProduct::with('rating')->where('shop_id',$shop->id)->get();
      return view('shopproduct',compact('shop','shopproduct'));
    }

    public function singleProduct($slug){
        $product=ShopProduct::with('category','rating')->where('slug',$slug)->first();
        
        $realtedProducts=ShopProduct::with('category')->where('category_id',$product->category_id)->get()->take(8);
        return view('single-product',compact('product','realtedProducts'));
    }

    public function allProducts(Request $request){
if($request->range!=null){
      $products=ShopProduct::with('category','rating')->where('status',1)->when($request->has('range'),function($q) use ($request) {
        $range=explode(',',$request->range);
        return $q->where('price','>=',$range[0])->where('price','<=',$range[1]);
      })->paginate(12);
    }else{
        $products=ShopProduct::with('category','rating')->where('status',1)->paginate(12);
    }
      info($products);
      $min=ShopProduct::with('category','rating')->min('price');
      $max=ShopProduct::with('category','rating')->max('price');
      return view('all-products',compact('products','min','max'));
    }

    public function productReview($product_id,$order_id){
        $product_id=base64_decode($product_id);
        $order_id=base64_decode($order_id);
        return view('product-review',compact('product_id','order_id'));
    }

    public function productReviewStore(Request $request,$product_id,$order_id){
        $request->validate([
            'rating' =>'required',
        ]);
        
        $checkSpam=ProductReview::where('product_id',$product_id)->where('order_id',$order_id)->when($request->ip_address !=null,function($q) use ($request) {
            $q->where('ip_address',$request->ip_address);
        })->where('user_id',auth()->user()->id)->count();
        $order=Order::find($order_id);
        if($checkSpam > 3){
           return redirect()->route('front.view.order',[$order->order_number])->with('error','Spam Review Detected');
        }
        
        ProductReview::create([
            'rating' =>$request->rating,
            'comment'=>$request->comment,
            'user_id'=>auth()->user()->id,
            'ip_address'=>$request->ip_address ?? '',
            'is_spam'=> ($checkSpam > 0) ? 1 : 0,
            'product_id'=>$product_id,
            'order_id'=>$order_id,
        ]);

        return redirect()->route('front.view.order',[$order->order_number])->with('success','Product Review Successfully Submitted');
    }
    
    

    
}
