<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'name',
        'nationality',
        'club_id',
        'photo_id'
    ];




    //------------------Club belongs to Coach (hasMany Relation)-----------------------------

    public function club()
    {
            return $this->belongsTo('App\Club');
    }



    public function photo(){


        return $this->belongsTo('App\Photo');


    }



}



