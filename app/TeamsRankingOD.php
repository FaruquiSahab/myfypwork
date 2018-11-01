<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamsRankingOD extends Model
{
    protected $fillable = [
        'club_id',
        'points',
        'photo_id'
    ];


    public function club()
    {
        return $this->belongsTo('App\Club','club_id');
    }


}
