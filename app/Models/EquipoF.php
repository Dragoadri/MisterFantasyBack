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
        return $this->belongsTo(jugadores::class, 'md_id', 'md_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id', 'jornada_id');
    }
}
