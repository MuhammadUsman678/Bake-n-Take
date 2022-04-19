<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    public function seller()
    {
        
        return view('admin.seller');
    }
    // public function nonverified()
    // {
    //     return view('admin.nonverified');
    // }
}
