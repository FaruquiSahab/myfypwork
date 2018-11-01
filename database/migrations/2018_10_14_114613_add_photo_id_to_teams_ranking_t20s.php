<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoIdToTeamsRankingT20s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams_ranking_t20s', function($table) {
            $table->integer('photo_id');
        });
    }

    /**
     * Reverse the migrations.

     * @return void
     */
    public function down()
    {
        Schema::table('teams_ranking_t20s', function($table) {
            $table->dropColumn('photo_id');
        });
    }
}
