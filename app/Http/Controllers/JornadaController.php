<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    public function getAll(Request $request)
    {
        $jornada = Jornada::get();
        return json_encode($jornada);
    }

    public function get(Request $request, $jornada_id) {
        $jornada = Jornada::where('id', $jornada_id)->get();
        return json_encode($jornada);
    }
    //
}
