<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function getAll(Request $request){
        $usuario = usuario::get();
        return json_encode($usuario);
    }

    public function get(Request $request, $usuario_id){
        $usuario = usuario::find($usuario_id);
        return json_encode($usuario);
    }

    public function insert(Request $request){
        $usuario = new usuario();
        $usuario->nickname = $request->nickname;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->rol = $request->rol;
        $usuario->save();
        return json_encode($usuario);
    }

    public function update(Request $request, $usuario_id){
        $usuario = usuario::find($usuario_id);
        $usuario->nickname = $request->nickname;
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->rol = $request->rol;
        $usuario->save();
        return json_encode($usuario);
    }

    public function delete(Request $request, $usuario_id){
        $usuario = usuario::find($usuario_id);
        $usuario->delete();
        return json_encode($usuario);
    }

    public function login(Request $request){
        $usuario = usuario::where('nickname', $request->nickname)->first();
        if($usuario != null){
            if($usuario->password == $request->password){
                return json_encode($usuario);
            }
        }
        return json_encode(-1);
    }


}
