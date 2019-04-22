<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{ protected $guarded = [];
protected $table = 'series';


    public function club()
    {
        return $this->belongsTo('App\Club');
    }

    public function club1()
    {
        return $this->belongsTo('App\Club','club_id_1');
    }

    public function club2()
    {
        return $this->belongsTo('App\Club','club_id_2');
    }


    public function series_type()
    {
        return $this->belongsTo('App\MatchType');
    }


    public function ground()
    {
        return $this->belongsTo('App\Ground');
    }



    public function series_fixture()
    {
        return $this->belongsTo('App\Series_Fixtures');
    }

}
