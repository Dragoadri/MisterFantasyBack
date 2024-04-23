<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;

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
    protected $table = 'estadisticas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'md_id',
        'jornada_id',
        'puntos',
        'total_mins_played',
        'total_penalty_save',
        'total_saves',
        'total_effective_clearance',
        'total_goals_conceded',
        'total_yellow_card',
        'total_ball_recovery',
        'total_poss_lost_all',
        'score_marca_points',
        'total_goals',
        'total_goal_assist',
        'total_offtarget_att_assist',
        'total_pen_area_entries',
        'total_penalty_won',
        'total_total_scoring_att',
        'total_won_contest',
        'total_penalty_failed',
        'total_penalty_conceded',
        'total_second_yellow_card',
        'total_own_goals',
        'total_red_card',
    ];

    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'md_id', 'id');
    }






}
