<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class TeamsRankingT20 extends Model
{
    protected $fillable = [
        'club_id',
        'points',
    ];


    public function club()
    {
        return $this->belongsTo('App\Club',' club_id');
    }





    public function photo()
    {
        return $this->belongsTo('App\Photo',' photo_id');
    }


}
