<?php

namespace App\Http\Controllers;

use App\Models\mercadousuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MercadoUsuarioController extends Controller
{
    public function getAll(Request $request)
    {
        $mUsuario = mercadousuario::get();
        return json_encode($mUsuario, JSON_UNESCAPED_UNICODE);
    }
    public function get(Request $request, $id)
    {
        $mUsuario = mercadousuario::where('id', $id)->get();
        return json_encode($mUsuario, JSON_UNESCAPED_UNICODE);
    }
    public function getMercadoByUsuario(Request $request, $user_id){
        $mUsuario = mercadousuario::where('user_id', $user_id)->get();
        return json_encode($mUsuario, JSON_UNESCAPED_UNICODE);
    }

    public function getTopPrices(Request $request)
    {

        // Obtener la fecha más reciente
        $latestDate = mercadousuario::max('fecha');

        // Obtener los registros con el mayor valor por cada md_id en la fecha más reciente
        $topPlayers = mercadousuario::where('fecha', $latestDate)
            ->join('jugadores', 'mercadousuarios.md_id', '=', 'jugadores.id')
            ->leftJoin('mercado', function ($join) {
                $join->on('jugadores.id', '=', 'mercado.md_player_id')
                    ->whereRaw('mercado.value = (select max(value) from mercado where mercado.md_player_id = jugadores.id)');
            })
            ->leftJoin('equipor', 'jugadores.team_id', '=', 'equipor.id')
            ->select('mercadousuarios.md_id', 'mercado.value', 'jugadores.position', 'jugadores.name', 'equipor.team_shortname')
            ->orderBy('mercado.value', 'desc')
            ->get();

        $resultados = $topPlayers->map(function ($item, $index) {
            return [
                'id' => $index + 1,
                'md_id' => $item->md_id,
                'jugador' => [
                    'name' => $item->name,
                    'position' => $item->position,
                ],
                'team_shortname' => $item->team_shortname,
                'value' => $item->value
            ];
        });

        return json_encode($resultados);
    }
}
