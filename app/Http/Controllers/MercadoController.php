<?php

namespace App\Http\Controllers;

use App\Models\mercado;
use Illuminate\Http\Request;

class MercadoController extends Controller
{
    public function getAll(Request $request)
    {
        $mercado = mercado::get();
        return json_encode($mercado);
//        return json_encode("HOLAA");
    }

//    public function get(Request $request, mercado $mercado_id)
//    {
//        return json_encode($mercado_id);
//    }

    public function get(Request $request, $md_id) {
        $mercado = Mercado::where('md_player_id', $md_id)->get();
        return json_encode($mercado);
    }

    public function getTopValues(Request $request)
    {
        // Buscamos fecha mas reciente en registros
        $latestDate = Mercado::max('date');
        // Obtenemos top 10 de jugadores con el mayor 'value' en esa fecha.
        $topPlayers = Mercado::where('date', $latestDate)
            ->orderBy('value', 'desc')
            ->take(10)
            ->with(['jugador' => function($query) {
                $query->select();
            }])
            ->get();


        return json_encode($topPlayers);
    }

    public function getTopPrices(Request $request)
    {
        // Buscamos fecha mas reciente en registros
        $latestDate = Mercado::max('date');
        // Obtenemos top 10 de jugadores con el mayor 'value' en esa fecha.
        $topPlayers = Mercado::where('date', $latestDate)
            ->orderBy('value', 'desc')
            ->take(10)
            ->with(['jugador' => function($query) {
                $query->select();
            }])
            ->get();

        

        return json_encode($topPlayers);
    }
}
