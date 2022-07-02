<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\newusernotification;
use App\User;
use App\shop;
use App\notification_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Alert;
class FrontController extends Controller
{
    public function shopregister(){
        return view('auth.shopregister');
    }
    public function storeshop(Request $request){
      $user=User::create([
       'name'=>$request->name,
       'email'=>$request->email,
       'role_id'=>3,
       'password'=>Hash::make($request->password),
       'status'=>0,
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
        $category=Category::where('slug',$slug)->where('status',1)->first();
        return $category;
    }

    public function categories(){
        $categories=Category::where('status',1)->get();
        return $categories;
    }
}
