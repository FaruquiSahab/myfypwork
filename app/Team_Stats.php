<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_Stats extends Model
{

    protected $guarded = [];
    protected $table = 'teams_stats';


    Public function club()
    {
        return $this->belongsTo('App\Club','club_id');
    }
}
