<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentsReference extends Model
{
    protected $guarded = [];

    public function tournament()
    {
    	return $this->belongsTo('App\Tournament');
    }

    public function photo()
    {
    	return $this->belongsTo('App\Photo');
    }



//    public function tournamentClubs()
//    {
//        return $this->belongsTo('App\TournamentClub');
//    }


    public function club()
    {
        return $this->belongsTo('App\Club');
    }



    public function clubs()
    {
        return $this->belongsToMany('App\Club');
    }

    public function tournament_format()
    {
        return $this->belongsTo('App\TournamentFormat');
    }


    public function tournament_type()
    {
        return $this->belongsTo('App\MatchType');
    }

    public function ground()
    {
        return $this->belongsTo('App\Ground','ground_id');
    }

}
