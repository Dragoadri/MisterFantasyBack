<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipor;
use Illuminate\Support\Facades\File;

class equiporController extends Controller
{
    public function getAll(Request $request){
        $equipor = equipor::get();
        return json_encode($equipor);
    }

    public function get(Request $request, $equipor_id){
        $equipor = equipor::find($equipor_id);
        return json_encode($equipor);
    }

}
