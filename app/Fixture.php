<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $guarded = [''];

    public function club1()
    {
    	return $this->belongsTo('App\Club','club_id_1');
    }

    public function club2()
    {
    	return $this->belongsTo('App\Club','club_id_2');
    }

    public function ground()
    {
    	return $this->belongsTo('App\Ground','ground_id');
    }

    public function tournament()
    {
    	return $this->belongsTo('App\Tournament','tournament_id');
    }
}
