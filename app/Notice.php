<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'club_id',
        'title',
        'section'
    ];


    public function club()
    {
        return $this->belongsTo('App\Club');
    }


}
