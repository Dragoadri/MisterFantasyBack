<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use Illuminate\Http\Request;
//la tabla es la siguiente:
/**
 * CREATE TABLE {bbdd_database_name}.estadisticas (
 * est_id INT AUTO_INCREMENT NOT NULL,
 * md_id INT UNSIGNED NOT NULL,
 * jornada_id INT UNSIGNED NOT NULL,
 * puntos INT,
 * total_mins_played INT,
 * total_penalty_save INT,
 * total_saves INT,
 * total_effective_clearance INT,
 * total_goals_conceded INT,
 * total_yellow_card INT,
 * total_ball_recovery INT,
 * total_poss_lost_all INT,
 * score_marca_points INT,
 * total_goals INT,
 * total_goal_assist INT,
 * total_offtarget_att_assist INT,
 * total_pen_area_entries INT,
 * total_penalty_won INT,
 * total_total_scoring_att INT,
 * total_won_contest INT,
 * total_penalty_failed INT,
 * total_penalty_conceded INT,
 * total_second_yellow_card INT,
 * total_own_goals INT,
 * total_red_card INT,
 * PRIMARY KEY(est_id),
 * FOREIGN KEY (md_id) REFERENCES {bbdd_database_name}.jugadores(md_id),
 * FOREIGN KEY (jornada_id) REFERENCES {bbdd_database_name}.jornadas(jornada_id)
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

    public function get(Request $request, $est_id) {
        $estadisticas = Estadistica::where('est_id', $est_id)->get();
        return json_encode($estadisticas);
    }



    public function getEstadisticasByJugador(Request $request, $md_id) {
        $estadisticas = Estadistica::where('md_id', $md_id)->get();
        return json_encode($estadisticas);

        }





    public function getEstadisticasByJornada(Request $request, $jornada)
    {
        $estadisticas = Estadistica::where('jornada_id', $jornada)->get();
        return json_encode($estadisticas);

    }}


