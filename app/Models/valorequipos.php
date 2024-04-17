<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class valorequipos extends Model
{
    use HasFactory;

    protected $table = 'valorequipos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //campos
    protected $fillable = [
        'user_id',
        'num_jugadores',
        'valor_equipo',
        'puntos_totales',
        'jornada_id'

    ];
   
    //userid refs user, jornadaid refs jornada si es 1 belongs to o has many 1 jornada varios vals equipo 1 user varios val equipos
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id','user_id');

    }
    public function jornada(){
        return $this->belongsTo(Jornada::class,'jornada_id','jornada_id');

    }

}
