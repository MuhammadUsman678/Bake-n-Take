<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions=Order::where('payment_status','paid')->get();
        return view('admin.orders.transaction',compact('transactions'));
    }
}
