<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function productDetails(){
        return $this->hasOne(ShopProduct::class,'id','product_id')->with('shop');
    }
}
