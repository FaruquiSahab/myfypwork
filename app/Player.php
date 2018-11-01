<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'age',
        'club_id',
        'role_id',
        'photo_id',
        'batting_style_id',
        'bowling_style_id',

    ];

//------------------Club belongs to Coach (hasMany Relation)-----------------------------

    public function club()
    {
        return $this->belongsTo('App\Club','club_id');
    }


    public function photo(){


        return $this->belongsTo('App\Photo','photo_id');


    }



    public function role(){


        return $this->belongsTo('App\PlayerRole');

    }




    public function batting_style(){


        return $this->belongsTo('App\BattingStyle','batting_style_id');

    }



    public function bowling_style(){


        return $this->belongsTo('App\BowlingStyle','bowling_style_id');

    }


}
