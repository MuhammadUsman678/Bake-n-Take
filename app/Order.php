<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $guarded = [];
    

    public function products(){
        return $this->hasMany(OrderProduct::class)->with('productDetails');
    }

    public function shopProducts(){
        return $this->hasManyThrough(
            OrderProduct::class, 
            ShopProduct::class,
            'id', // Foreign key on the types table...
            'order_id', // Foreign key on the items table...
            'id', // Local key on the users table...
            'id' // Local key on the categories table...
        )->where('shop_id',auth()->user()->shop->id)->with('productDetails');
    }
}
