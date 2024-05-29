<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $usuario = Usuario::find($usuario_id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        if ($request->has('nickname')) {
            $usuario->nickname = $request->nickname;
        }
        if ($request->has('correo')) {
            $usuario->correo = $request->correo;
        }
        if ($request->has('password')) {
            $usuario->password = Hash::make($request->password);
        }
        if ($request->has('rol')) {
            $usuario->rol = $request->rol;
        }

        $usuario->save();
        return response()->json(['message' => 'Usuario actualizado correctamente']);
    }

    public function delete(Request $request, $usuario_id){
        $usuario = Usuario::find($usuario_id);
        if ($usuario) {
            $usuario->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente']);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
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
