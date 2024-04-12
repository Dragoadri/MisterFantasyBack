<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//La tabla es la siguiente:

/**
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
class Partido extends Model
{

    use HasFactory;

    protected $table = 'partidos';
    protected $primaryKey = 'jornada_id';
    protected $fillable = [
        'temporada',
        'fecha',
        'jornada',
        'equipo_local',
        'equipo_visitante',
        'resultado',
        'resultado_local',
        'resultado_visitante',
        'id_equipo_local',
        'id_equipo_visitante',
    ];

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_local', 'team_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo_visitante', 'team_id');

    }




}
