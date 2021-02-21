<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlatilloController;
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




/* lista por ID y busqueda completa
Route::get("list_tipo_pedido/{id_pedido?}",[PedidoController::class,'listID']);
Route::get("list_platillo/{id_platillo?}",[PlatillosController::class,'listID']);

Route::get("list_pedido/{id?}",[CabeceraPedidoController::class,'listID']);*/


Route::group([
    'prefix' => 'get',
], function () {
    Route::get("rol/{id?}",[RolController::class,'get'])->middleware('auth:api');
    Route::get("usuario/{id?}",[UsuarioController::class,'get'])->middleware('auth:api');
    Route::get("local/{id?}",[LocalController::class,'get']);
    Route::get("categoria/{id?}",[CategoriaController::class,'get']);
    Route::get("platillo/{id?}",[PlatilloController::class,'get']);
 
});

Route::group([
    'prefix' => 'post',
    'middleware' => 'auth:api'
], function () {
    Route::post("rol", [RolController::class,'add'])->middleware('auth:api');
    Route::post("usuario", [UsuarioController::class,'add'])->middleware('auth:api');
    Route::post("local", [LocalController::class,'add'])->middleware('auth:api');
    Route::post("categoria", [CategoriaController::class,'add'])->middleware('auth:api');
    Route::post("platillo", [PlatilloController::class,'add'])->middleware('auth:api');
 
});


Route::group([
    'prefix' => 'put',
    'middleware' => 'auth:api'
], function () {    
    Route::put("rol",[RolController::class,'update'])->middleware('auth:api');
    Route::put("usuario",[UsuarioController::class,'update'])->middleware('auth:api');
    Route::put("local",[LocalController::class,'update'])->middleware('auth:api');
    Route::put("categoria",[CategoriaController::class,'update'])->middleware('auth:api');
    Route::put("platillo",[PlatilloController::class,'update'])->middleware('auth:api');
 
});

Route::group([
    'prefix' => 'delete',
    'middleware' => 'auth:api'
], function () {    
    Route::delete("rol/{id}",[RolController::class,'delete'])->middleware('auth:api');
    Route::delete("local/{id}",[LocalController::class,'delete'])->middleware('auth:api');
    Route::delete("categoria/{id}",[CategoriaController::class,'delete'])->middleware('auth:api');
    Route::delete("platillo/{id}",[PlatilloController::class,'delete'])->middleware('auth:api');
 
});

Route::group([
    'prefix' => 'search'
], function () {    
    Route::get("rol/{key}",[RolController::class,'search'])->middleware('auth:api')->middleware('auth:api');
    Route::get("usuario/{key}",[UsuarioController::class,'search'])->middleware('auth:api')->middleware('auth:api');
    Route::get("local/{key}",[LocalController::class,'search']);
    Route::get("platillo/{key}",[PlatilloController::class,'search']);
});




/*
Route::post("add_pedido", [CabeceraPedidoController::class,'add']);*/


