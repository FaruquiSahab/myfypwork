<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BowlingStyle extends Model
{
    protected $fillable = ['name'];

    public function player()
    {
        return $this->hasOne('App\Player','bowling_style_id');

    }
}
