<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
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
         * CREATE TABLE {bbdd_database_name}.estadistica (
         * est_id INT NOT NULL AUTO_INCREMENT,
         * md_id INT UNSIGNED NOT NULL,
         * jornada_id INT NOT NULL,
         * puntos INT DEFAULT NULL,
         * total_mins_played INT DEFAULT NULL,
         * total_penalty_save INT DEFAULT NULL,
         * total_saves INT DEFAULT NULL,
         * total_effective_clearance INT DEFAULT NULL,
         * total_goals_conceded INT DEFAULT NULL,
         * total_yellow_card INT DEFAULT NULL,
         * total_ball_recovery INT DEFAULT NULL,
         * total_poss_lost_all INT DEFAULT NULL,
         * score_marca_points INT DEFAULT NULL,
         * total_goals INT DEFAULT NULL,
         * total_goal_assist INT DEFAULT NULL,
         * total_offtarget_att_assist INT DEFAULT NULL,
         * total_pen_area_entries INT DEFAULT NULL,
         * total_penalty_won INT DEFAULT NULL,
         * total_total_scoring_att INT DEFAULT NULL,
         * total_won_contest INT DEFAULT NULL,
         * total_penalty_failed INT DEFAULT NULL,
         * total_penalty_conceded INT DEFAULT NULL,
         * total_second_yellow_card INT DEFAULT NULL,
         * total_own_goals INT DEFAULT NULL,
         * total_red_card INT DEFAULT NULL,
         * PRIMARY KEY(est_id),
         * FOREIGN KEY (md_id) REFERENCES {bbdd_database_name}.jugadores(md_id),
         * FOREIGN KEY (jornada_id) REFERENCES {bbdd_database_name}.jornadas(jornada_id)
         *
         * );
         */
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('md_id');
            $table->unsignedBigInteger('jornada_id');
            $table->integer('puntos')->nullable();
            $table->integer('total_mins_played')->nullable();
            $table->integer('total_penalty_save')->nullable();
            $table->integer('total_saves')->nullable();
            $table->integer('total_effective_clearance')->nullable();
            $table->integer('total_goals_conceded')->nullable();
            $table->integer('total_yellow_card')->nullable();
            $table->integer('total_ball_recovery')->nullable();
            $table->integer('total_poss_lost_all')->nullable();
            $table->integer('score_marca_points')->nullable();
            $table->integer('total_goals')->nullable();
            $table->integer('total_goal_assist')->nullable();
            $table->integer('total_offtarget_att_assist')->nullable();
            $table->integer('total_pen_area_entries')->nullable();
            $table->integer('total_penalty_won')->nullable();
            $table->integer('total_total_scoring_att')->nullable();
            $table->integer('total_won_contest')->nullable();
            $table->integer('total_penalty_failed')->nullable();
            $table->integer('total_penalty_conceded')->nullable();
            $table->integer('total_second_yellow_card')->nullable();
            $table->integer('total_own_goals')->nullable();
            $table->integer('total_red_card')->nullable();
            $table->foreign('md_id')->references('md_id')->on('jugadores');
            $table->foreign('jornada_id')->references('jornada_id')->on('jornadas');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadisticas');
    }
}
