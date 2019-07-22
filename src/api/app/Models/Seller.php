<?php

namespace App\Models;

class Seller extends BaseModel
{
    protected $table = 'sellers';

    protected $fillable = [
        'fullname',
        'mail',
        'username',
        'password',
        'subsidiary_id',
    ];

    protected $casts = [
        'subsidiary_id' => 'integer',
    ];

    public function subsidiary()
    {
        return $this->belongsTo('App\Models\Subsidiary');
    }

}
