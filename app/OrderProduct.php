<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public function productDetails(){
        return $this->hasOne(ShopProduct::class,'id','product_id')->with('shop');
    }
}
