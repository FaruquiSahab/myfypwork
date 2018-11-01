<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerRole extends Model
{
    protected $fillable = ['name'];


    public function player()
    {
        return $this->hasOne('App\Player');

    }





}