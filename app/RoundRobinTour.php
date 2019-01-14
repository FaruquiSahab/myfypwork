<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundRobinTour extends Model
{
    protected $guarded = [];

    public function tournamentClub()
    {
        return $this->belongsTo('App\TournamentsReference');
    }


    public function clubs()
    {
        return $this->belongsTo('App\Club');
    }


}
