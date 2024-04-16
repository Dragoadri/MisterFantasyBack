<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JornadaController extends Controller
{
    public function getAll(Request $request)
    {
        //$jornadas = jornadas::get();
        //return json_encode($jornadas);
        return json_encode("HOLAA");
    }
    //
}
