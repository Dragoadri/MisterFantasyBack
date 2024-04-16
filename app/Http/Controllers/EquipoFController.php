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
        $equipo = EquipoF::where('equipo_id', $equipo_id)->get();
        return json_encode($equipo);
    }
    //
}
