<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoF extends Model
{
    use HasFactory;

    protected $table = 'equipof';

    protected $primaryKey = 'id';

    protected $fillable = [
        'md_id',
        'user_id',
        'jornada_id'
    ];

    public function jugador()
    {
        //Si es hasMany, se intercambia el orden de los nombres de las variables, osea ('id','md_id')
        //return $this->belongsTo(jugadores::class,'md_id','id');
        return $this->hasMany(jugadores::class, "id",'md_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id', 'id');
    }
}
