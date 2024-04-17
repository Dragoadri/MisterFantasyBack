<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    public function getAll(Request $request)
    {
        $partidos = Partido::get();
        return json_encode($partidos);
    }

    public function get(Request $request, $partido_id) {
        $partidos = Partido::where('partido_id', $partido_id)->get();
        return json_encode($partidos);
    }
}
