<?php

namespace App\Http\Controllers;

use App\Models\valorequipos;
use Illuminate\Http\Request;

class ValorEquiposController extends Controller
{
    public function getAll(Request $request){
        $valorequipos = valorequipos::get();
        return json_encode($valorequipos, JSON_UNESCAPED_UNICODE);
       // return json_encode("Hola");
    }
    //
    public function get(Request $request, $id)
    {
        $valorequipos = valorequipos::where('id', $id)->get();
        return json_encode($valorequipos, JSON_UNESCAPED_UNICODE);
    }
}
