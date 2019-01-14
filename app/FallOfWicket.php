<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FallOfWicket extends Model
{
    protected $guarded = [];
    protected $table = 'fall_of_wickets';

    public function batsmen()
    {
    	return $this->belongsTo('App\Player','batsmen_id');
    }
}
