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



}




