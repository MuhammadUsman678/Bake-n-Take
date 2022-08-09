<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductReview;
use App\ShopProduct;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index(){
        $reviews=ProductReview::with('product')->get();
        return view('admin.products.product-reviews',compact('reviews'));
    }

    public function changeStatus($id,$status){
        ProductReview::find($id)->update(['status'=>$status]);
        return redirect()->route('admin.product-review');
    }

    public function fakeReviews(){
        $reviews=ProductReview::where('is_spam',1)->with('product')->get();
        return view('admin.products.product-fake-reviews',compact('reviews'));
    }
}
