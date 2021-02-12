<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlatillosController;
use App\Http\Controllers\DetallePlatilloController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\CabeceraPedidoController;
use App\Http\Controllers\UsuarioController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//lista por ID y busqueda completa
Route::get("list_tipo_pedido/{id_pedido?}",[PedidoController::class,'listID']);
Route::get("list_platillo/{id_platillo?}",[PlatillosController::class,'listID']);
Route::get("list_local/{id_local?}",[LocalController::class,'listID']);
Route::get("list_tipo_usuario/{id?}",[TipoUsuarioController::class,'listID']);
Route::get("list_usuario/{id?}",[UsuarioController::class,'listID']);
Route::get("list_pedido/{id?}",[CabeceraPedidoController::class,'listID']);


//post
Route::post("add_tipo_pedido", [PedidoController::class,'add']);
Route::post("add_platillo", [PlatillosController::class,'add']);
Route::post("add_local", [LocalController::class,'add']);
Route::post("add_tipo_usuario", [TipoUsuarioController::class,'add']);
Route::post("add_usuario", [UsuarioController::class,'add']);
Route::post("add_pedido", [CabeceraPedidoController::class,'add']);


//put
Route::put("update_tipo_pedido",[PedidoController::class,'update']);
Route::put("update_platillo",[PlatillosController::class,'update']);
Route::put("update_local",[LocalController::class,'update']);
Route::put("update_usuario",[UsuarioController::class,'update']);
Route::put("update_tipo_usuario",[TipoUsuarioController::class,'update']);


//delete
Route::delete("delete_tipo_pedido/{id_pedido}",[PedidoController::class,'delete']);
Route::delete("delete_platillo/{id_platillo}",[PlatillosController::class,'delete']);
Route::delete("delete_local/{id_local}",[LocalController::class,'delete']);
Route::delete("delete_tipo_usuario/{id_local}",[TipoUsuarioController::class,'delete']);


//search
Route::get("search_platillo/{nombre_platillo}",[PlatillosController::class,'search']);
Route::get("search_pedido/{deta_pedido}",[PedidoController::class,'search']);
Route::get("search_local/{nombre_local}",[LocalController::class,'search']);
Route::get("search_tipo_usuario/{tipo_usuario}",[TipoUsuarioController::class,'search']);
Route::get("search_usuario/{usuario}",[UsuarioController::class,'search']);

//agregar con validación de ingresos
Route::post("save_platillo",[PlatillosController::class,'testData']);
Route::post("save_pedido",[PedidoController::class,'testData']);
Route::post("save_local",[LocalController::class,'testData']);
Route::post("save_detalle_pedido",[DetallePlatilloController::class,'testData']);


