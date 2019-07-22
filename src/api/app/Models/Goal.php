<?php

namespace App\Models;

class Goal extends BaseModel
{
    protected $table = 'goals';

    protected $fillable = [
        'name',
        'description',
        'mount',
        'type_goal_id',
    ];

    protected $casts = [
        'mount' => 'float',
        'type_goal_id' => 'integer',
    ];

    public function type_goal()
    {
        return $this->belongsTo('App\Models\TypeGoal');
    }

    public function product_line_goals()
    {
        return $this->hasMany('App\Models\ProductLineGoal');
    }

    public function subsidiary_goals()
    {
        return $this->hasMany('App\Models\SubsidiaryGoal');
    }

    public function bonuses()
    {
        return $this->hasMany('App\Models\Bonus');
    }

}
