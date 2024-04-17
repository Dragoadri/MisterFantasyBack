<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    /**
     * Route::get('/partidos', [PartidosController::class, 'getAll']);
     * Route::get('/partidos/{part_id}', [PartidosController::class, 'get']);
     * Route::get('/partidos/equipo/{equipo_id}', [PartidosController::class, 'getPartidosByEquipo']);
     * Route::get('/partidos/temporada/{temporada}', [PartidosController::class, 'getPartidosByTemporada']);
     * Route::get('/partidos/jornada/{jornada}', [PartidosController::class, 'getPartidosByJornada']);
     * Route::get('/partidos/resultado/{resultado}', [PartidosController::class, 'getPartidosByResultado']);
     * Route::get('/partidos/resultado_local/{resultado_local}', [PartidosController::class, 'getPartidosByResultadoLocal']);
     * Route::get('/partidos/resultado_visitante/{resultado_visitante}', [PartidosController::class, 'getPartidosByResultadoVisitante']);
     */
    public function getAll(Request $request)
    {
        $partidos = Partido::get();
        return json_encode($partidos);
    }

    public function get(Request $request, $partido_id) {
        $partidos = Partido::where('jornada_id', $partido_id)->get();
        return json_encode($partidos);
    }

    public function getPartidosByEquipo(Request $request, $equipo_id) {
        $partidos = Partido::where('id_equipo_local', $equipo_id)->orWhere('id_equipo_visitante', $equipo_id)->get();
        return json_encode($partidos);
    }

    public function getPartidosByTemporada(Request $request, $temporada) {
        $partidos = Partido::where('temporada', $temporada)->get();
        return json_encode($partidos);
    }

    public function getPartidosByJornada(Request $request, $jornada) {
        $partidos = Partido::where('jornada', $jornada)->get();
        return json_encode($partidos);
    }

    public function getPartidosByResultado(Request $request, $resultado) {
        $partidos = Partido::where('resultado', $resultado)->get();
        return json_encode($partidos);
    }

    public function getPartidosByResultadoLocal(Request $request, $resultado_local) {
        $partidos = Partido::where('resultado_local', $resultado_local)->get();
        return json_encode($partidos);
    }

    public function getPartidosByResultadoVisitante(Request $request, $resultado_visitante) {
        $partidos = Partido::where('resultado_visitante', $resultado_visitante)->get();
        return json_encode($partidos);
    }
}
