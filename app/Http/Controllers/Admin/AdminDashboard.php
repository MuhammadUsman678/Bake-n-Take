<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\newusernotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\shop;


class AdminDashboard extends Controller
{
    public function adminLogin(Request $request){
        $auth=Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_id'=>1]);
        if($auth)
        {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->url(env('FRONTPAGE_VERIFY_URL'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function pendingapproved()
    {
        $pendingshop=shop::where('status',0)->get();
        return view('admin.pendingapproval',compact('pendingshop'));
    }
    public function approvedshop()
    {
        $approved=shop::where('status',1)->get();
        return view('admin.approvedshop',compact('approved'));
    }
    public function delete_shop(Request $request)
    {
        $user=User::findorfail($request->user_id);
     $shop=shop::where('user_id',$user->id)->delete();
        $user->delete();
        return response()->json(['success'=>'Shop Deleted Successfully']);
    }
    public function status_active(Request $request)
    {
        $user=User::findorfail($request->statusId);
$shop=Shop::where('user_id',$user->id)->first();
     if($user->status==0){
$user->update([
    'status'=>1
]);
     }else{
        $user->update([
            'status'=>0
        ]);   
     }
   if($shop->status==0){
    $shop->update([
        'status'=>1
    ]);
    return response()->json(['success'=>'Shop Approved Successfully']);
   }else{
    $shop->update([
        'status'=>0
    ]); 
    return response()->json(['success'=>'Shop Rejected Successfully']); 
   }  
        
    }
    
//    public function notify()
//    {
//        if(auth()->user())
//        {
//            $user=User::whereId(1)->first();
//            auth()->user()->notify(new newusernotification($user));
//        }
     
//    }


}
