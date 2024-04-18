<?php

namespace App\Http\Controllers;

use App\Models\mercadousuario;
use Illuminate\Http\Request;

class MercadoUsuarioController extends Controller
{
    public function getAll(Request $request)
    {
        $mUsuario = mercadousuario::get();
        return json_encode($mUsuario, JSON_UNESCAPED_UNICODE);
    }
    //
}
