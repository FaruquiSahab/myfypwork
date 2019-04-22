<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series_Fixtures extends Model
{

    protected $guarded = [''];
    protected $table = 'series_fixtures';

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


    public function series()
    {
        return $this->belongsTo('App\Series');
    }


    public function series_type()
    {
        return $this->belongsTo('App\MatchType');
    }

}
