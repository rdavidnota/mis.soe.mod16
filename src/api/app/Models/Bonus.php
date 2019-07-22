<?php


namespace App\Models;


class Bonus extends BaseModel
{
    protected $table = 'bonuses';

    protected $fillable = [
        'prize',
        'initial_date',
        'expiration_date',
        'goal_id',
    ];

    protected $casts = [
        'goal_id' => 'integer',
    ];

    protected $dates = [
        'initial_date',
        'expiration_date',
    ];

    public function goal()
    {
        return $this->belongsTo('App\Models\Goal');
    }

}
