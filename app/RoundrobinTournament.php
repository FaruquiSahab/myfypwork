<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundrobinTournament extends Model
{
    protected $guarded = [];
    protected $table ='roundrobin_tournament';
}
