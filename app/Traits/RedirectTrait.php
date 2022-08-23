<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RedirectTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function redirectToRoute()
    { 
        $role = Auth::user()->role_id;
        if ($role===1) {
            return route('admin.dashboard');
        } elseif ($role===3) {
            return route('shop.dashboard');

        } elseif($role==2) {
            if(Auth::user()->status==0){
                Auth::logout();
                session()->flash('error','Account Banned by the admin');
                return route('login');
            }
            return '/';
        }
    }
}
