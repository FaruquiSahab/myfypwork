<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bowler_Stats extends Model
{
    protected $guarded = [];
    protected $table = 'player_stats';


    Public function player()
    {
        return $this->belongsTo('App\Player','player_id');
    }


    Public function club()
    {
        return $this->belongsTo('App\Club','club_id');
    }
}
