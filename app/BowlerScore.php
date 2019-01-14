<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BowlerScore extends Model
{
    protected $guarded = [];

    public function batsmen()
    {
    	return $this->belongsTo('App\Player','bowler_id');
    }
}
