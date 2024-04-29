<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject
{

    /**
     * la tabla es CREATE TABLE {bbdd_database_name}.usuario (
     * id INT UNSIGNED NOT NULL,
     * username VARCHAR(255) UNIQUE,
     * correo VARCHAR(255) UNIQUE,
     * password VARCHAR(255),
     * rol VARCHAR(255),
     * PRIMARY KEY(id)
     * );
     */



    use HasFactory;
    protected $hidden = [
        'password',
    ];

    protected $table = 'usuarios';
    // Especificamos la clave primaria si no es 'id'.
//    protected $primaryKey = 'user_id';
    // Laravel asume que cada tabla tiene timestamps (created_at y updated_at),
    // si no es así, deshabilitamos esta funcionalidad
    public $timestamps = false;

    // Especificamos los campos a asignar
    protected $fillable = [
           'username',
            'correo',
            'rol',
            'password'

    ];







    public function getUsuario($id){
        return $this->where('id', $id)->first();
    }

    public function getUsuarioByUsername($username){
        return $this->where('username', $username)->first();
    }

    public function getUsuarioByCorreo($correo){
        return $this->where('correo', $correo)->first();
    }

    public function getUsuarios(){
        return $this->all();
    }



    public function getJWTIdentifier()
    {
       return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
