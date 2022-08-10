<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification_user extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];

}

