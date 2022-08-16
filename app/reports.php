<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    protected $fillable = [
        'user_id',
        'description',
    ];
}
