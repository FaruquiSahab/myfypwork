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



    public function club()
    {
        return $this->belongsTo('App\Club');
    }

}
