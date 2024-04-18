<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class equiporController extends Controller
{
    public function getEquipor(Request $request){
        return json_encode("HOLA");
    }
}
