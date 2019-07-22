<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'coordinate_y',
    ];

    protected $casts = [
        'price' => 'float',
        'product_line_id' => 'integer',
    ];

    public function product_line()
    {
        return $this->belongsTo('App\Models\ProductLine');
    }

}
