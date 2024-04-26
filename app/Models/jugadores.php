<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugadores extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla si no sigue la convención de nombres de Laravel.
    protected $table = 'jugadores';
    // Especificamos la clave primaria si no es 'id'.
    //protected $primaryKey = 'id';
    // Laravel asume que cada tabla tiene timestamps (created_at y updated_at),
    // si no es así, deshabilitamos esta funcionalidad
    public $timestamps = false;

    // Especificamos los campos a asignar
    protected $fillable = [
        'name',
        'nickname',
        'md_name',
        'position',
        'position_id',
        'slug',
        'team_id',
    ];

    // 'team_id' es una clave foránea, se define con referencia al modelo equipor.
    public function team()
    {
        return $this->belongsTo(equipor::class, 'team_id', 'id');
    }
    /*
    public function teamf()
    {
        return $this->belongsTo(EquipoF::class,'id','md_id');
    }
    */
    
}
