<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class);
    }
}
