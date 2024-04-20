<?php

use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\MercadoController;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\EquipoFController;
use App\Http\Controllers\parti;
use App\Http\Controllers\PartidosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValorEquiposController;
use App\Http\Controllers\equiporController;
use App\Http\Controllers\MercadoUsuarioController;
use App\Http\Controllers\usuarioController;


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

Route::get('/mercadotop', [MercadoController::class, 'getTopValues']);

Route::get('/jornadas/temporada/{temporada}', [JornadaController::class, 'getByTemporada']);
Route::get('/jornadas/{jor_id}', [JornadaController::class, 'get']);

//Route::get('/equipoF', [EquipoFController::class, 'getAll']);
Route::get('/equipoF/{equi_id}', [EquipoFController::class, 'get']);

Route::get('/equipor', [equiporController::class, 'getAll']);

//PARTIDOS

Route::get('/partidos', [PartidosController::class, 'getAll']);
Route::get('/partidos/{part_id}', [PartidosController::class, 'get']);
Route::get('/partidos/equipo/{equipo_id}', [PartidosController::class, 'getPartidosByEquipo']);
Route::get('/partidos/temporada/{temporada}', [PartidosController::class, 'getPartidosByTemporada']);
Route::get('/partidos/jornada/{jornada}', [PartidosController::class, 'getPartidosByJornada']);
Route::get('/partidos/resultado/{resultado}', [PartidosController::class, 'getPartidosByResultado']);
Route::get('/partidos/resultado_local/{resultado_local}', [PartidosController::class, 'getPartidosByResultadoLocal']);
Route::get('/partidos/resultado_visitante/{resultado_visitante}', [PartidosController::class, 'getPartidosByResultadoVisitante']);

//ESTADISTICAS
Route::get('/estadisticas', [EstadisticasController::class, 'getAll']);
Route::get('/estadisticas/{est_id}', [EstadisticasController::class, 'get']);
Route::get('/estadisticas/jugador/{md_id}', [EstadisticasController::class, 'getEstadisticasByJugador']);
Route::get('/estadisticas/top-jugadores/{temporada}', [EstadisticasController::class, 'getTopJugadoresTemporada']);
Route::get('/estadisticas/puntos-jugadores/{temporada}', [EstadisticasController::class, 'getJugadoresTotalPuntos']);
Route::get('/estadisticas/jornada/{jornada_id}', [EstadisticasController::class, 'getEstadisticasByJornada']);

//Valor equipos
Route::get('/valorequipos', [ValorEquiposController::class, 'getAll']);

Route::get('/valorequipos/jornada-id/{jornada_id}', [ValorEquiposController::class, 'getWithUsernameByJornadaId']);

//mercado Usuario
Route::get('/mercadousuario',[MercadoUsuarioController::class, 'getAll']);

Route::get('/mercadousuario/{id}', [MercadoUsuarioController::class, 'get']);
Route::get('/mercadousuario/{user_id}',[MercadoUsuarioController::class, 'getMercadoByUsuario']);

Route::get('/usuarios',[usuarioController::class, 'getAll']);
