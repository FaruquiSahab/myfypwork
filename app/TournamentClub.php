<?php

namespace App;

    use Illuminate\Database\Eloquent\Model;

class TournamentClub extends Model
{
    protected $guarded = [];


    public function tournamentClub()
    {
        return $this->belongsTo('App\TournamentsReference','id');
    }


    public function clubs()
    {
        return $this->belongsTo('App\Club');
    }

    public function ground()
    {
        return $this->belongsTo('App\Ground','ground_id');
    }




}
