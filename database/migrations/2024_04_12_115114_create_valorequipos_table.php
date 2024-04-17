<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorequiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valorequipos', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id');
            $table->integer('num_jugadores');
            $table->integer('valor_equipo');
            $table->integer('puntos_totales');
            $table->integer('jornada_id');
            $table->foreign('user_id')->references('user_id')->on('User');
            $table->foreign('jornada_id')->references('jornada_id')->on('Jornada');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valorequipos');
    }
}
