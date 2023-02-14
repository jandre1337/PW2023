<?php

use App\Http\Controllers\BilheteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrotaController;
use App\Http\Controllers\ParqueController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarifarioController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ZonaTarifaController;
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

Route::get('/dashboard', [DashboardController ::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("tarifarios", [TarifarioController ::class, 'index']);
    Route::get("tarifarios/new", [TarifarioController ::class, 'create']);
    Route::post("tarifarios/new", [TarifarioController ::class, 'store']);
    Route::get("tarifarios/{id}", [TarifarioController ::class, 'edit']);
    Route::put("tarifarios/{id}", [TarifarioController ::class, 'update']);
    Route::get("tarifarios/{id}/delete", [TarifarioController ::class, 'destroy']);

    Route::get("parques", [ParqueController::class, 'index']);
    Route::get("parques/new", [ParqueController::class, 'create']);
    Route::post("parques/new", [ParqueController::class, 'store']);
    Route::get("parques/{id}", [ParqueController::class, 'edit']);
    Route::put("parques/{id}", [ParqueController::class, 'update']);
    Route::get("parques/{id}/delete", [ParqueController::class, 'destroy']);

    Route::get("clientes", [ClienteController::class, 'index']);
    Route::get("clientes/new", [ClienteController::class, 'create']);
    Route::post("clientes/new", [ClienteController::class, 'store']);
    Route::get("clientes/{cc}", [ClienteController::class, 'edit']);
    Route::put("clientes/{cc}", [ClienteController::class, 'update']);
    Route::get("clientes/{cc}/delete", [ClienteController::class, 'destroy']);

    Route::get("frotas", [FrotaController::class, 'index']);
    Route::get("frotas/new", [FrotaController::class, 'create']);
    Route::post("frotas/new", [FrotaController::class, 'store']);
    Route::get("frotas/{id}", [FrotaController::class, 'edit']);
    Route::put("frotas/{id}", [FrotaController::class, 'update']);
    Route::get("frotas/{id}/delete", [FrotaController::class, 'destroy']);

    Route::get("pisos", [PisoController::class, 'index']);
    Route::get("pisos/{id}/new", [PisoController::class, 'create']);
    Route::post("pisos/{id}/new", [PisoController::class, 'store']);
    Route::get("pisos/{id}", [PisoController::class, 'edit']);
    Route::put("pisos/{id}", [PisoController::class, 'update']);
    Route::get("pisos/{id}/delete", [PisoController::class, 'destroy']);

    Route::get("lugar", [LugarController::class, 'index']);
    Route::get("lugar/{id}/new", [LugarController::class, 'create']);
    Route::post("lugar/{id}/new", [LugarController::class, 'store']);
    Route::get("lugar/{id}", [LugarController::class, 'edit']);
    Route::put("lugar/{id}", [LugarController::class, 'update']);
    Route::get("lugar/{id}/delete", [LugarController::class, 'destroy']);

    Route::get("veiculos", [VeiculoController::class, 'index']);
    Route::get("veiculos/new", [VeiculoController::class, 'create']);
    Route::post("veiculos/new", [VeiculoController::class, 'store']);
    Route::get("veiculos/{id}", [VeiculoController::class, 'edit']);
    Route::put("veiculos/{id}", [VeiculoController::class, 'update']);
    Route::get("veiculos/{id}/delete", [VeiculoController::class, 'destroy']);


    Route::get("zonas", [ZonaController::class, 'index']);
    Route::get("zonas/new", [ZonaController::class, 'create']);
    Route::post("zonas/new", [ZonaController::class, 'store']);
    Route::get("zonas/{id}", [ZonaController::class, 'edit']);
    Route::put("zonas/{id}", [ZonaController::class, 'update']);
    Route::get("zonas/{id}/delete", [ZonaController::class, 'destroy']);

    Route::get("bilhete", [BilheteController::class, 'create']);
    Route::post("bilhete", [BilheteController::class, 'store']);
    Route::get("bilhete/pagar", [BilheteController::class, 'edit']);
    Route::put("bilhete/pagar/{id}", [BilheteController::class, 'update']);

    Route::get("zonas_tarifa/{tarifa_id}/new", [ZonaTarifaController::class, 'create']);
    Route::post("zonas_tarifa/{tarifa_id}/new", [ZonaTarifaController::class, 'store']);
    Route::get("zonas_tarifa/{id}", [ZonaTarifaController::class, 'edit']);
    Route::put("zonas_tarifa/{id}", [ZonaTarifaController::class, 'update']);
    Route::get("zonas_tarifa/{id}/delete", [ZonaTarifaController::class, 'destroy']);

});

require __DIR__.'/auth.php';
