<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayersRankingOD extends Model
{
    protected $fillable = [
        'club_id',
        'points',
        'player_id',
        'role_id'
    ];

    public function club()
    {
        return $this->belongsTo('App\Club','club_id');

    }



    public function player()
    {
        return $this->belongsTo('App\Player','player_id');

    }


    public function role()
    {
        return $this->belongsTo('App\Role','role_id');

    }


 }
