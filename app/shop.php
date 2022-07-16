<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $fillable = [
       'user_id', 'shop_name', 'description', 'phone','address','city','ntn_no','cnic_no','document','status'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
