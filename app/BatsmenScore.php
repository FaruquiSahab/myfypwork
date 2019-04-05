<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatsmenScore extends Model
{
    protected $guarded = [];

    public function batsmen()
    {
    	return $this->belongsTo('App\Player','batsmen_id');
    }

    public function bowler()
    {
    	return $this->belongsTo('App\Player','out_by');
    }

    public function fielder()
    {
    	return $this->belongsTo('App\Player','out_by');
    }
    public function out()
    {
    	return $this->belongsTo('App\Out','out_how','value');
    }
}
