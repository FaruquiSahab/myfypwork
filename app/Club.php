<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{



    protected $fillable = [
        'name',
        'level_id',
        'photo_id',
    ];




    public function photo(){


        return $this->belongsTo('App\Photo');


    }



    public function level(){


        return $this->belongsTo('App\Level');


    }




    //------------------Club has many Grounds-----------------------------

    public function grounds()
    {
        return $this->hasMany('App\Ground');
    }


    //------------------Club has many Coaches-----------------------------

    public function coaches()
    {
        return $this->hasMany('App\Coach');
    }




    //------------------Club has many Players-----------------------------

    public function players()
    {
        return $this->hasMany('App\Player');
    }


    //------------------Club has many Notices-----------------------------

    public function notices()
    {
        return $this->hasMany('App\Notice');
    }



    //------------------Club has many Series------------------------------------

    public function series()
    {
        return $this->hasMany('App\Series');
    }


    //------------------Club has many TeamRankingT20-----------------------------

    public function TeamsRankingT20()
    {
        return $this->hasMany('App\TeamsRankingT20');
    }




    //------------------Club has many TeamRankingOD-----------------------------

    public function TeamsRankingOD()
    {
        return $this->hasMany('App\TeamsRankingOD');
    }




    //------------------Club has many PlayerRankingOD-----------------------------

    public function PlayersRankingOD()
    {
        return $this->hasMany('App\PlayerRankingOD');
    }


    //------------------Club has many PlayerRankingT20-----------------------------

    public function PlayersRankingT20()
    {
        return $this->hasMany('App\PlayerRankingT20');
    }



    public function tournaments()
    {
        return $this->belongsTo('App\TournamentReference');
    }


    public function tournament_club()
    {
        return $this->belongsToMany('App\TournamentClub');
    }



}
