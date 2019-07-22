<?php

namespace App\Models;

class ProductLine extends BaseModel
{
    protected $table = 'product_lines';

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function product_line_goal()
    {
        return $this->hasMany('App\Models\ProductLineGoal');
    }

}
