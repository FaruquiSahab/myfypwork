<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id_1');
            $table->integer('club_id_2');
            $table->integer('ground_id');
            $table->integer('pitch_id');
            $table->integer('mom_player_id');
            $table->integer('umpire_id');
            $table->integer('tournament_id');
            $table->date('date');
            $table->string('status');
            $table->integer('winner_club_id');
            $table->integer('match_type_id');
            $table->string('toss');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
