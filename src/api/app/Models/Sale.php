<?php


namespace App\Models;


class Sale extends BaseModel
{
    protected $table = 'sales';

    protected $fillable = [
        'price',
        'quantity',
        'total',
        'sale_date',
        'seller_id',
        'subsidiary_id',
        'product_id',
    ];

    protected $casts = [
        'seller_id' => 'integer',
        'subsidiary_id' => 'integer',
        'product_id' => 'integer',
    ];

    protected $dates = [
        'sale_date',
    ];

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller');
    }

    public function subsidiary()
    {
        return $this->belongsTo('App\Models\Subsidiary');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
