<?php

namespace App\Models;

class TypeGoal extends BaseModel
{
    protected $table = 'type_goals';

    protected $fillable = [
        'name',
        'description',
    ];

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

}
