<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoF extends Model
{
    use HasFactory;

    protected $table = 'equipof';

    protected $primaryKey = 'equipo_id';
}
