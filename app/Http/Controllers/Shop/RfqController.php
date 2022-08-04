<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\quotation_detail;
use App\shop;

class RfqController extends Controller
{
  public function index(){
    $shop=shop::where('user_id',auth()->user()->id)->first();
   $detail=quotation_detail::with('quotation')->where('shop_id',$shop->id)->where('status',0)->get();
 
    return view('shop.rfq.index',compact('detail'));
  }
}
