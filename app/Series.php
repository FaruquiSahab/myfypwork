<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{ protected $fillable = [
    'club_id_1',
    'club_id_2',
    'name'
];


    public function club()
    {
        return $this->belongsTo('App\Club');
    }

}
