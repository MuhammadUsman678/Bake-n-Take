<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quotation;
use App\shop;
use App\chat;
use App\User;
use App\quotation_detail;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Hash;
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
            $data[$key]['shop_id']=$row->productDetails->shop_id;
            $data[$key]['status']=$row->status;
            $data[$key]['price']=$row->price;
            $t1 = Carbon::parse($row->take_way_date_time);
            $t2 = Carbon::parse(now());
            $diff = $t1->diff($t2);
            // dd($diff);
            if(\Carbon\Carbon::now()->greaterThan($t1)) $time = 0;
            else $time=(($diff->h*60)+$diff->i).'.'.$diff->s;
            $data[$key]['take_way_time']=$time;
            $data[$key]['slug']=$row->productDetails->slug;
            $data[$key]['image']=$row->productDetails->getFirstMediaUrl('images','thumb') ? $row->productDetails->getFirstMediaUrl('images','thumb') : 'https://via.placeholder.com/60?text=No+Image+Found';
        }
        $products= $data;
        
        return view('account.view-order',compact('order','products'));
    }
    public function quotation(){
        $quote=quotation::where('user_id',auth()->user()->id)->get();
        return view('viewquotation',compact('quote'));
    }
    public function quotationmessage($id){
        $quotation=quotation_detail::where('quotation_id',$id)->get();
        return view('quotationmessage',compact('quotation'));

    }
    public function getMessages(Request $request,$id)
    {
      
        $quotation=quotation_detail::where('shop_id',$id)->get();
    $check=shop::find($id);
    
       $users =User::find($check->user_id);
      
       $mychat=Chat::whereIn('user_id',[auth()->user()->id,$users->id])->whereIn('sender_id',[auth()->user()->id,$users->id])->orderBy("created_at")->get();
        // return $course;
        return view('quotationmessage',compact('users','mychat','quotation'));
    }
    public function myaccount(){
return view('myaccount');
    }
    public function updateregister(Request $request){
        $this->validate($request,[
'name'=>'required',
'email'=>'required'

        ]);
       
        $user=User::find(auth()->user()->id);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('profileimages', $filename);
         
            $image = $filename;
         
         }else{
            $image=$user->image;
         }
      
        $user->update([
'name'=>$request->name,
'email'=>$request->email,
'image'=>$image,
        ]);
        if(isset($request->c_password))
        {
          $request->validate([
             'new_password' => 'required|min:8',
             'confirm_password' => 'required_with:password|same:new_password|min:8'
 
         ]);
         if(Hash::check($request->c_password,$user->password)) {
                 $user->update([
             'password' => Hash::make($request->new_password),
         ]);
                    return back()->with('success','Your profile has been updated!');
 
 
         }else{
             $msg= "Your Password does't match";
             return back()->with('error','Your password doesnot match!');
         }
       }else{
                     return back()->with('success','Your profile has been updated!');
 
 
       }

return back()->with('success','Your Profile is updated');
    }
}
