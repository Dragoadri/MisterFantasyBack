<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;

    protected $table = 'estadisticas';
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
