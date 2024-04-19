<?php

namespace App\Http\Controllers;

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
}
