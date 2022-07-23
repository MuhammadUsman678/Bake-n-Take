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
    $details =$user->name.' Requested for new shp registeration';

    $id="1";
    $this->userNotify($id,$details);
    Alert::success('Congrats', 'You\'ve Successfully Registered');
       return back();
    }
    function userNotify($id,$details)
    {
        $notify = new notification_user();
        $notify->user_id =$id;
        $notify->data = $details;
        $notify->save();
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
        $shopproduct=ShopProduct::where('shop_id',$shop->id)->get();
      return view('shopproduct',compact('shop','shopproduct'));
    }

    public function singleProduct($slug){
        $product=ShopProduct::with('category')->where('slug',$slug)->first();
        $realtedProducts=ShopProduct::with('category')->where('category_id',$product->category_id)->get()->take(8);
        return view('single-product',compact('product','realtedProducts'));
    }

    public function allProducts(Request $request){
      $products=ShopProduct::with('category')->where('status',1)->paginate(4);
      return view('all-products',compact('products'));
    }
}
