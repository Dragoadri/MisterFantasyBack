<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //La tabla en sql es la siguiente:
        /**
 *
*
* CREATE TABLE {bbdd_database_name}.partidos (
         * jornada_id INT AUTO_INCREMENT NOT NULL,
         * temporada TEXT NOT NULL,
         * fecha YEAR,
         * jornada INT,
         * equipo_local VARCHAR(255),
         * equipo_visitante VARCHAR(255),
         * resultado TEXT,
         * resultado_local INT,
         * resultado_visitante INT,
         * id_equipo_local INT UNSIGNED NOT NULL,
         * id_equipo_visitante INT UNSIGNED NOT NULL,
         * PRIMARY KEY(jornada_id),
         * FOREIGN KEY (id_equipo_local) REFERENCES {bbdd_database_name}.equipor(team_id),
         * FOREIGN KEY (id_equipo_visitante) REFERENCES {bbdd_database_name}.equipor(team_id)
         * );
         */
//        Schema::dropIfExists('partidos');

        if (!Schema::hasTable('partidos')) {
            Schema::create('partidos', function (Blueprint $table) {
                $table->id();
                $table->string('temporada');
                $table->year('fecha');
                $table->integer('jornada');
                $table->string('equipo_local');
                $table->string('equipo_visitante');
                $table->string('resultado')->nullable();
                $table->integer('resultado_local')->nullable();
                $table->integer('resultado_visitante')->nullable();
                $table->unsignedBigInteger('id_equipo_local');
                $table->unsignedBigInteger('id_equipo_visitante');
                $table->foreign('id_equipo_local')->references('id')->on('equipor');
                $table->foreign('id_equipo_visitante')->references('id')->on('equipor');
                $table->timestamps();
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
        Schema::dropIfExists('partidos');
    }
}
