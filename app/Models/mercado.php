<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mercado extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla si no sigue la convención de nombres de Laravel.
    protected $table = 'mercado';
    // Especificamos la clave primaria si no es 'id'.
    protected $primaryKey = 'mercado_id';
    // Laravel asume que cada tabla tiene timestamps (created_at y updated_at),
    // si no es así, deshabilitamos esta funcionalidad
    public $timestamps = false;

    // Especificamos los campos a asignar
    protected $fillable = [
        'md_player_id',
        'date',
        'value',
    ];

    public function jugador()
    {
        return $this->belongsTo(jugadores::class, 'md_player_id', 'md_id');
    }
}
