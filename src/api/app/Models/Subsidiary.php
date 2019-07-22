<?php

namespace App\Models;

class Subsidiary extends BaseModel
{
    protected $table = 'subsidiaries';

    protected $fillable = [
        'name',
        'description',
        'percentage_goal',
    ];

    protected $casts = [
        'percentage_goal' => 'decimal',
    ];

    public function seller()
    {
        return $this->hasMany('App\Models\Seller');
    }


    public function subsidiary_goal()
    {
        return $this->hasMany('App\Models\SubsidiaryGoal');
    }

}
