<?php

namespace App\Models;

class SubsidiaryGoal extends BaseModel
{
    protected $table = 'subsidiary_goals';

    protected $fillable = [
        'subsidiary_id',
        'goal_id',
    ];

    protected $casts = [
        'subsidiary_id' => 'integer',
        'goal_id' => 'integer',
    ];

    public function subsidiary()
    {
        return $this->belongsTo('App\Models\Subsidiary');
    }


    public function goal()
    {
        return $this->belongsTo('App\Models\Goal');
    }
}
