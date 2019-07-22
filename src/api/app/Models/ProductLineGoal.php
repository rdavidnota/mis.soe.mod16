<?php

namespace App\Models;

class ProductLineGoal extends BaseModel
{
    protected $table = 'product_line_goals';

    protected $fillable = [
        'product_line_id',
        'goal_id',
    ];

    protected $casts = [
        'product_line_id' => 'integer',
        'goal_id' => 'integer',
    ];

    public function product_line()
    {
        return $this->belongsTo('App\Models\ProductLine');
    }

    public function goal()
    {
        return $this->belongsTo('App\Models\Goal');
    }
}
