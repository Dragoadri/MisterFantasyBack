<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use Illuminate\Http\Request;
//la tabla es la siguiente:
/**
 * CREATE TABLE {bbdd_database_name}.estadistica (
 * id INT NOT NULL AUTO_INCREMENT,
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
 * PRIMARY KEY(id),
 * FOREIGN KEY (md_id) REFERENCES {bbdd_database_name}.jugadores(id),
 * FOREIGN KEY (jornada_id) REFERENCES {bbdd_database_name}.jornadas(id)
 *
 * );
 */




class EstadisticasController extends Controller
{

    /**
     * Route::get('/estadisticas', [EstadisticasController::class, 'getAll']);
     * Route::get('/estadisticas/{est_id}', [EstadisticasController::class, 'get']);
     * Route::get('/estadisticas/jugador/{md_id}', [EstadisticasController::class, 'getEstadisticasByJugador']);
     * Route::get('/estadisticas/jornada/{jornada_id}', [EstadisticasController::class, 'getEstadisticasByJornada']);
     * Route::get('/estadisticas/equipo/{equipo_id}', [EstadisticasController::class, 'getEstadisticasByEquipo']);
     * Route::get('/estadisticas/temporada/{temporada}', [EstadisticasController::class, 'getEstadisticasByTemporada']);
     */

    public function getAll(Request $request)
    {
        $estadisticas = Estadistica::get();
        return json_encode($estadisticas);
    }

    public function get(Request $request, $est_id)
    {
        $estadisticas = Estadistica::where('id', $est_id)->get();
        return json_encode($estadisticas);
    }


    public function getEstadisticasByJugador(Request $request, $md_id)
    {
        $estadisticas = Estadistica::where('md_id', $md_id)->get();
        return json_encode($estadisticas);
    }





    public function getEstadisticasByJornada(Request $request, $jornada_id)
    {
        $estadisticas = Estadistica::where('jornada_id', $jornada_id)->get();
        return json_encode($estadisticas);
    }
}


