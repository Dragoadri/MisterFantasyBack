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
        if (!Schema::hasTable('mercadousuarios')) {
            Schema::create('mercadousuarios', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->unsignedBigInteger('md_id');
                $table->year('fecha');
                $table->unsignedBigInteger('user_id');
                $table->foreign('md_id')->references('id')->on('jugadores');
                $table->foreign('user_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('mercadousuarios');
    }
}
