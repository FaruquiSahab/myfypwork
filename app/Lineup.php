<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{
    protected $guarded = [];
    protected $table = 'lineups';


    public function player()
    {
    	return $this->belongsTo('App\Player','player_id');
    }
    public function match()
    {
    	return $this->belongsTo('App\Match','match_id');
    }
    public function club()
    {
    	return $this->belongsTo('App\Club','club_id');
    }

}




