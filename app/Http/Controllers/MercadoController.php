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
}
