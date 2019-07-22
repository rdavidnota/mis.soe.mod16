<?php

namespace App\Models;

class Configuration extends BaseModel
{
    protected $table = 'configurations';

    protected $fillable = [
        'exchange_rate',
    ];

    protected $casts = [
        'exchange_rate' => 'float',
    ];

}
