<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insert extends Model
{
    protected $guarded = [];
    protected static $logFillable = true;
    protected $casts = [
        'options' => 'array'
    ];
}
