<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{

protected $fillable = [
    'name',
    'club_id',
    'photo_id',
    'type_id'
];



//------------------Club belongs to Ground (hasMany Relation)-----------------------------

    public function club()
    {
        return $this->belongsTo('App\Club');
    }



    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }


 /*   public function groundType()
    {
        return $this->belongsTo('App\GroundType');
    }*/


}
