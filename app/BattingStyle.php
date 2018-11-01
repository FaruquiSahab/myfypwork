<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BattingStyle extends Model
{
    protected $fillable = ['name'];



    public function player()
    {
        return $this->hasOne('App\Player','batting_style_id');

    }
}
