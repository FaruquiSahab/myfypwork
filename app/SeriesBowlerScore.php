<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeriesBowlerScore extends Model
{
    protected $guarded = [];

    public function bowler()
    {
    	return $this->belongsTo('App\Player','bowler_id');
    }
}
