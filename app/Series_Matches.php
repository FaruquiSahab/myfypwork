<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series_Matches extends Model
{
    protected $guarded = [];
    protected $table = 'series_matches';


    public function club1()
    {
        return $this->belongsTo('App\Club','club_id_1');
    }
    public function club2()
    {
        return $this->belongsTo('App\Club','club_id_2');
    }
    public function winner()
    {
        return $this->belongsTo('App\Club','winner_club_id');
    }
    public function ground()
    {
        return $this->belongsTo('App\Ground','ground_id');
    }
    public function pitch()
    {
        return $this->belongsTo('App\Pitch','pitch_id');
    }
    public function player()
    {
        return $this->belongsTo('App\Player','mom_player_id');
    }
    public function umpire()
    {
        return $this->belongsTo('App\Umpire','umpire_id');
    }
    public function series()
    {
        return $this->belongsTo('App\Tournament','series_id');
    }
    public function matchtype()
    {
        return $this->belongsTo('App\MatchType','match_type_id');
    }


    public function toss_name()
    {
        return $this->belongsTo('App\Club','toss');
    }

}
