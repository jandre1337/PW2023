<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ParqueController;
use App\Http\Controllers\TarifarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("clientes", [ClienteController::class, 'index']);
Route::get("clientes/new", [ClienteController::class, 'create']);
Route::post("clientes/new", [ClienteController::class, 'store']);
Route::get("clientes/{cc}", [ClienteController::class, 'edit']);
Route::put("clientes/{cc}", [ClienteController::class, 'update']);
Route::get("clientes/{cc}/delete", [ClienteController::class, 'destroy']);

Route::get("parques", [ParqueController::class, 'index']);
Route::get("parques/new", [ParqueController::class, 'create']);
Route::post("parques/new", [ParqueController::class, 'store']);
Route::get("parques/{id}", [ParqueController::class, 'edit']);
Route::put("parques/{id}", [ParqueController::class, 'update']);
Route::get("parques/{id}/delete", [ParqueController::class, 'destroy']);

Route::get("tarifarios", [TarifarioController ::class, 'index']);
Route::get("tarifarios/new", [TarifarioController ::class, 'create']);
Route::post("tarifarios/new", [TarifarioController ::class, 'store']);
Route::get("tarifarios/{id}", [TarifarioController ::class, 'edit']);
Route::put("tarifarios/{id}", [TarifarioController ::class, 'update']);
Route::get("tarifarios/{id}/delete", [TarifarioController ::class, 'destroy']);

