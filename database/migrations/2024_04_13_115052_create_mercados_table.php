<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMercadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mercado')) {
            Schema::create('mercado', function (Blueprint $table) {
                $table->id('id');
                $table->unsignedBigInteger('md_player_id');
                $table->date('date');
                $table->bigInteger('value');
                $table->foreign('md_player_id')->references('id')->on('jugadores');
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
        Schema::dropIfExists('mercados');
    }
}
