<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipor extends Model
{
    use HasFactory;
    protected $table = "equipor";
    // Especificamos la clave primaria si no es 'id'.
    protected $primaryKey = 'team_id';
    // Laravel asume que cada tabla tiene timestamps (created_at y updated_at),
    // si no es así, deshabilitamos esta funcionalidad
    public $timestamps = false;
    
    // Especificamos los campos a asignar
    protected $fillable = [
        'team_name',
        'team_shortname'
    ];
}
