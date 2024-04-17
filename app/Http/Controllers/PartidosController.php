<?php

namespace App\Http\Controllers;
class PartidosController
{
    public function getAll(Request $request)
    {
        $partidos = Partidos::get();
        return json_encode($partidos);
    }

    public function get(Request $request, $partido_id) {
        $partidos = Partidos::where('partido_id', $partido_id)->get();
        return json_encode($partidos);
    }
    //

}
