<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umpire extends Model
{
    protected $fillable = [
        'name',
        'nationality',
        'photo_id'
    ];




    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
