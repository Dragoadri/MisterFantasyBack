<?php

namespace App\Http\Controllers;

use App\Models\EquipoF;
use App\Models\Jornada;
use App\Models\jugadores;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //$jornada = Jornada::get()->last();
        $jornada = Equipof::get()->max('jornada_id');
        $ids = EquipoF::where([['user_id', $user_id], ["jornada_id", $jornada]])->get()->pluck("md_id");
        $jugadores = jugadores::whereIn("id", $ids)->get();
        //$equipo = EquipoF::where('user_id', $user_id)->with('jugador')->get();
        return json_encode($jugadores, JSON_UNESCAPED_UNICODE);
    }

    public function getEquipoByCorreo(Request $request, $correo)
    {
        //$jornada = Jornada::get()->last();
        $id_usuario = Usuario::where('correo', $correo)->pluck('id');
        $jornada = Equipof::get()->max('jornada_id');
        $ids = EquipoF::where([['user_id', $id_usuario], ["jornada_id", $jornada]])->get()->pluck("md_id");
        $jugadores = jugadores::whereIn("id", $ids)->get();
        //$equipo = EquipoF::where('user_id', $user_id)->with('jugador')->get();
        return json_encode($jugadores, JSON_UNESCAPED_UNICODE);
    }

    public function getLeastPoints(Request $request)
    {
        $leastPlayers = DB::table('equipof')
        ->select('equipof.md_id', 'jugadores.position', 'jugadores.name', 'equipor.team_name', DB::raw('SUM(estadisticas.puntos) AS puntos'))
        ->join('jugadores', 'equipof.md_id', '=', 'jugadores.id')
        ->leftJoin('estadisticas', 'jugadores.id', '=', 'estadisticas.md_id')
        ->leftJoin('equipor', 'jugadores.team_id', '=', 'equipor.id')
        ->where('equipof.md_id', '<>', 999999999)
        ->groupBy('equipof.md_id', 'jugadores.name', 'jugadores.position', 'equipor.team_name')
        ->orderBy('puntos', 'asc')
        ->get();

        $resultados = $leastPlayers->map(function ($item, $index) {
            return [
                'id' => $index + 1,
                'md_id' => $item->md_id,
                'jugador' => [
                    'name' => $item->name,
                    'position' => $item->position,
                ],
                'team_name' => $item->team_name,
                'puntos' => $item->puntos
            ];
        });

        return json_encode($resultados);
    }
}
