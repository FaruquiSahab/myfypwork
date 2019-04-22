<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series_Lineups extends Model
{
    protected $guarded = [];
    protected $table = 'series_lineups';

    public function player()
    {
        return $this->belongsTo('App\Player','player_id');
    }
}
