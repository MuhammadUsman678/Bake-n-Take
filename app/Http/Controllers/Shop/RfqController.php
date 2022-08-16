<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\quotation_detail;
use App\quotation;
use App\shop;

class RfqController extends Controller
{
  public function index(){
    $shop=shop::where('user_id',auth()->user()->id)->first();
   $detail=quotation_detail::with('quotation')->where('shop_id',$shop->id)->get();
 
    return view('shop.rfq.index',compact('detail'));
  }
  public function reject(Request $request){
    $delete=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->first();

    $delete->delete();
    return response()->json(['success'=>'Quotation Rejected']);
  }
  public function accept(Request $request){
    $delete=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id','!=',$request->shopid)->delete();
    $update=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->update([
      'status'=>1,
    ]);
    $quotation=quotation::find($request->quotationid);
    $quotation->update([
      'status'=>1,
    ]);

    return response()->json(['success'=>'Quotation Accepted and now in progress']);
  }
  public function complete(Request $request){

    $update=quotation_detail::where('quotation_id',$request->quotationid)->where('shop_id',$request->shopid)->update([
      'status'=>2,
    ]);
    $quotation=quotation::find($request->quotationid);
    $quotation->update([
      'status'=>2,
    ]);

    return response()->json(['success'=>'congratulation on completed your order']);
  }
}
