<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game', function (Blueprint $table) {
            $table->foreign('id_championship')->references('id')->on('championship');
            $table->foreign('id_team_h')->references('id')->on('team');
            $table->foreign('id_team_v')->references('id')->on('team');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game', function (Blueprint $table) {
            $table->dropForeign('game_id_championship_foreign');
            $table->dropForeign('game_id_team_h_foreign');
            $table->dropForeign('game_id_team_v_foreign');
        });
    }
}
