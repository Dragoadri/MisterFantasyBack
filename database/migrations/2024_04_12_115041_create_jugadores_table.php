<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('jugadores')) {
            Schema::create('jugadores', function (Blueprint $table) {
                $table->id('id');
                $table->string('name');
                $table->string('nickname');
                $table->string('md_name');
                $table->string('position');
                $table->integer('position_id');
                $table->string('slug');
                $table->unsignedBigInteger('team_id');
                $table->foreign('team_id')->references('id')->on('equipors');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
