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

    protected $table = 'estadistica';
    protected $primaryKey = 'est_id';
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
        return $this->belongsTo(Jugador::class, 'md_id', 'md_id');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id', 'jornada_id');
    }





}
