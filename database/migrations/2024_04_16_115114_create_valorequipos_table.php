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
            $table->unsignedBigInteger('user_id');
            $table->integer('num_jugadores');
            $table->integer('valor_equipo');
            $table->integer('puntos_totales');
            $table->unsignedBigInteger('jornada_id');
            $table->foreign('user_id')->references('id')->on('usuarios');
            $table->foreign('jornada_id')->references('id')->on('jornadas');



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
