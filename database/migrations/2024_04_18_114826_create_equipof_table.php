<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoFTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('equipof')) {
            Schema::create('equipof', function (Blueprint $table) {
                $table->id('id');
                $table->timestamps();
                $table->unsignedBigInteger('md_id');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('jornada_id');
                $table->foreign('md_id')->references('id')->on('jugadores');
                $table->foreign('user_id')->references('id')->on('usuarios');
                $table->foreign('jornada_id')->references('id')->on('jornadas');
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
        Schema::dropIfExists('equipof');
    }
}
