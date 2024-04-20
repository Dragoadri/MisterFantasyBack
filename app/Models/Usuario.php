<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    // Especificamos la clave primaria si no es 'id'.
//    protected $primaryKey = 'user_id';
    // Laravel asume que cada tabla tiene timestamps (created_at y updated_at),
    // si no es así, deshabilitamos esta funcionalidad
    public $timestamps = false;

    // Especificamos los campos a asignar
    protected $fillable = [
        'nickname',
        'correo',
        'rol'
    ];
}
