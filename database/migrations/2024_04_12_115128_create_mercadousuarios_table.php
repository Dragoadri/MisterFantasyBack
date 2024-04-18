<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMercadousuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadousuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('md_id');
            $table->year('fecha');
            $table->integer('user_id');
            $table->foreign('md_id')->references('md_id')->on('jugadores');
            $table->foreign('user_id')->references('user_id')->on('User');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mercadousuarios');
    }
}
