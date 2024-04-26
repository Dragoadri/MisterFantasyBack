<?php

namespace App\Http\Controllers;

use App\Models\EquipoF;
use Illuminate\Http\Request;

class EquipoFController extends Controller
{
    public function getAll(Request $request)
    {
        $equipo = EquipoF::get();
        return json_encode($equipo);
    }

    public function get(Request $request, $equipo_id) {
        $equipo = EquipoF::where('id', $equipo_id)->get();
        return json_encode($equipo);
    }
    //
    public function getEquipoByUsuario(Request $request, $user_id)
    {
        $equipo = EquipoF::where('user_id', $user_id)->with('jugador')->get();
        return json_encode($equipo);
    }
}
