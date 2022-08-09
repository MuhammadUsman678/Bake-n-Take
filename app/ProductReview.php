<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    // public static function getAllReview(){
    //     return ProductReview::with('user_info')->paginate(10);
    // }
    // public static function getAllUserReview(){
    //     return ProductReview::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    // }

    public function product(){
        return $this->hasOne(ShopProduct::class,'id','product_id')->with('shop');
    }

}
