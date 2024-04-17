<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mercadousuario extends Model
{
    use HasFactory;

    protected $table = 'mercadousuario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'md_id',
        'fecha',
        'user_id'
    ];

    public function jugador()
    {
        return $this->belongsTo(jugadores::class, 'md_id', 'md_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
