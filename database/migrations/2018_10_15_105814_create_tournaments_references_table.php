<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments_references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_id');
            $table->integer('tournament_type_id');
            $table->integer('tournament_format_id');
            $table->integer('number_of_teams');
            $table->integer('winner_club_id');
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
        Schema::dropIfExists('tournaments_references');
    }
}
