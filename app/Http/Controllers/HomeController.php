<?php

namespace App\Http\Controllers;

use App\ShopProduct;
use App\Category;
use Illuminate\Http\Request;
use App\quotation;
use App\quotation_detail;
use App\shop;
use App\User;
use App\notification_user;
class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=ShopProduct::with('category:id,category_name','rating')->where('status',1)->inRandomOrder()
        ->limit(5)->get();
        
        $top_rated=ShopProduct::with('category:id,category_name','rating')->where('status',1)->get()
        ->filter(function($q){
            return $q->rating->sum('rating') > 3;
        });
        
        return view('index',compact('products','top_rated'));
    }
    public function quotation()
    {
        $category=Category::get();
        $shop=shop::get();
        return view('quotation_request',compact('category','shop'));
    }
    public function postquotation(Request $request){
        if ($request->hasfile('image'))
        {
        $image=$request->file('image');
        $imageName = $image->getClientOriginalName();
       
        $image->move('shopdocument',$imageName);
        }else{
            $imageName=null;   
        }
        $user=User::find(auth()->user()->id);
        $details=$user->name."Request for quotation";
        $quotation=quotation::create([
            'user_id'=>auth()->user()->id,
            'name'=>$request->productname,
            'category'=>$request->category,
            'price'=>$request->price,
            'description'=>$request->description,
            'date'=>$request->date,
            'image'=>$imageName,
        ]);
        for ($i=0;$i<count($request->shop);$i++){
            quotation_detail::create([
                'quotation_id'=>$quotation->id,
            'shop_id'=>$request->shop[$i],
            
            ]);
            foreach($request->shop as $row)
            {
               
                $shop=shop::whereId($row)->first();
                $this->userNotify($shop->user_id,$details);
            }
        }
        return back()->with('success',"Yor Quotation Send to All selcted Shops");
    }
    function userNotify($id,$details)
    {
        $notify = new notification_user();
        $notify->user_id =$id;
        $notify->data = $details;
        $notify->save();
    }
}
