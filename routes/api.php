<?php

use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\MercadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/jugadores', [JugadoresController::class, 'getAll']);

Route::get('/jugadores/{jug_id}', [JugadoresController::class, 'get']);

Route::get('/mercado', [MercadoController::class, 'getAll']);

//Route::get('/mercado/{md_id}', [MercadoController::class, 'get']);
Route::get('/mercado/{md_id}', [MercadoController::class, 'get']);
