<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipof', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('md_id');
            $table->integer('user_id');
            $table->integer('jornada_id');
            $table->foreign('md_id')->references('md_id')->on('jugadores');
            $table->foreign('user_id')->references('user_id')->on('User');
            $table->foreign('jornada_id')->references('user_id')->on('Jornada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipof');
    }
}
