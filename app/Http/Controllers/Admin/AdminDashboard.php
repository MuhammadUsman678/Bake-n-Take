<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\newusernotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\shop;
use App\mail\approvedmail;
use App\mail\rejectmail;


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
        $count['pendingshop']=shop::where('status',0)->count();
        $count['approved']=shop::where('status',1)->count();
        return view('admin.dashboard',$count);
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
$shop=shop::where('user_id',$user->id)->first();
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
    $maildetail=[
        'username'=>$user->name,
        'shop_name'=>$shop->shop_name,
    ];
    \Mail::to($user->email)->send(new approvedmail($maildetail));
    return response()->json(['success'=>'Shop Approved Successfully']);
   }else{
    $shop->update([
        'status'=>0
    ]);
    $maildetail=[
        'username'=>$user->name,
        'shop_name'=>$shop->shop_name,
    ];
    \Mail::to($user->email)->send(new rejectmail($maildetail)); 
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

public function editprofile(){
    $user=User::find(auth()->user()->id);
   
    return view('admin.editprofile',compact('user'));
}
public function updateprofile(Request $request){
    $user=User::find(auth()->user()->id);

   $user->name=$request->name;
   $user->email=$request->email;
 
   if(isset($request->image))
   {
    
   $image=$request->file('image');
   $imageName = $image->getClientOriginalName();
   $user->image=$imageName;
   $path=$image->move('profileimages',$imageName);
   
   }
 $user->update();
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
         $request->session()->flash('error',$msg);
        return redirect('/admin/editprofile');
    }
  }else{
                return back()->with('success','Your profile has been updated!');


  }

  
  return back()->with('success','Your profile has been updated!');
}
}
