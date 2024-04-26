<?php

namespace App\Http\Controllers;

use App\Models\valorequipos;
use Illuminate\Http\Request;

class ValorEquiposController extends Controller
{
    public function getAll(Request $request){
        $valorequipos = valorequipos::with(['usuario' => function($query) {
            $query->select();
        }])->get();
        return json_encode($valorequipos, JSON_UNESCAPED_UNICODE);
       // return json_encode("Hola");
    }

    public function getWithUsernameByJornadaId(Request $request, $jornada_id){
//        $valorequipos = valorequipos::get();
        $valorequipos = valorequipos::where('jornada_id', $jornada_id)
            ->orderBy('puntos_totales', 'desc')
            ->with(['usuario' => function($query) {
                $query->select();
            }])
            ->get();
        return json_encode($valorequipos, JSON_UNESCAPED_UNICODE);
        // return json_encode("Hola");
    }
    //
    public function get(Request $request, $id)
    {
        $valorequipos = valorequipos::where('id', $id)->get();
        return json_encode($valorequipos, JSON_UNESCAPED_UNICODE);
    }

    public function getLastValueByUser(Request $request, $user_id){
        $valorequipos= valorequipos::where('user_id',$user_id)->with('Usuario')->get()->last();
        return json_encode($valorequipos);
    }
}
