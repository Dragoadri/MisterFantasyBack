<?php

use App\Models\Estadistica;
use Illuminate\Http\Request;


class EstadisticasController
{
    public function getAll(Request $request)
    {
        $estadisticas = Estadistica::get();
        return json_encode($estadisticas);
    }

    public function get(Request $request, $estadisticas_id) {
        $estadisticas = Estadistica::where('estadisticas_id', $estadisticas_id)->get();
        return json_encode($estadisticas);
    }
    //

}
