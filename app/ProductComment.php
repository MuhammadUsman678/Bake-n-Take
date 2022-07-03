<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable=['user_id','post_id','comment','replied_comment','parent_id','status'];

    // public function user_info(){
    //     return $this->hasOne('App\User','id','user_id');
    // }
    // public static function getAllComments(){
    //     return ProductComment::with('user_info')->paginate(10);
    // }

    // public static function getAllUserComments(){
    //     return ProductComment::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    // }

    // public function post(){
    //     return $this->belongsTo(Post::class,'post_id','id');
    // }

    // public function replies(){
    //     return $this->hasMany(ProductComment::class,'parent_id')->where('status','active');
    // }
}
