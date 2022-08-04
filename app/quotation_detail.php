<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotation_detail extends Model
{
    protected $guarded=[
        'created_at','updated_at'
    ];
    public function quotation(){
        return $this->belongsTo(quotation::class,'quotation_id','id');
}

}
