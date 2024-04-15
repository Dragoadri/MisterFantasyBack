<?php

namespace App\Http\Controllers;

use App\Models\jugadores;
use Illuminate\Http\Request;

class JugadoresController extends Controller
{
    public function getAll(Request $request)
    {
        $jugadores = jugadores::get();
        return json_encode($jugadores, JSON_UNESCAPED_UNICODE);
//        return json_encode("HOLAA");
    }

    public function get(Request $request, jugadores $jug_id)
    {
        // JSON_UNESCAPED_UNICODE para mostrar Óscar y no /00n0scar
        return json_encode($jug_id, JSON_UNESCAPED_UNICODE);
    }
}
