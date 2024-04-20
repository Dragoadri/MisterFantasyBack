<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
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
    protected $table = 'usuario';
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

    public function insertUsuario($username, $correo, $password, $rol){
        $usuario = new Usuario();
        $usuario->username = $username;
        $usuario->correo = $correo;
        $usuario->password = $password;
        $usuario->rol = $rol;
        $usuario->save();
    }

    public function updateUsuario($id, $username, $correo, $password, $rol){
        $usuario = $this->where('id', $id)->first();
        $usuario->username = $username;
        $usuario->correo = $correo;
        $usuario->password = $password;
        $usuario->rol = $rol;
        $usuario->save();
    }

    public function deleteUsuario($id){
        $usuario = $this->where('id', $id)->first();
        $usuario->delete();
    }

    public function getRol($id){
        $usuario = $this->where('id', $id)->first();
        return $usuario->rol;
    }

    public function login($username, $password){
        $usuario = $this->where('username', $username)->first();
        if($usuario != null){
            if($usuario->password == $password){
                return $usuario->id;
            }
        }
        return -1;
    }

}
