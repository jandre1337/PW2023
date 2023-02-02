<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FrotaController;
use App\Http\Controllers\ParqueController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get("frotas/{cc}", [FrotaController::class, 'edit']);
    Route::put("frotas/{cc}", [FrotaController::class, 'update']);
    Route::get("frotas/{cc}/delete", [FrotaController::class, 'destroy']);

    Route::get("pisos", [FrotaController::class, 'index']);
    Route::get("pisos/new", [FrotaController::class, 'create']);
    Route::post("pisos/new", [FrotaController::class, 'store']);
    Route::get("pisos/{cc}", [FrotaController::class, 'edit']);
    Route::put("pisos/{cc}", [FrotaController::class, 'update']);
    Route::get("pisos/{cc}/delete", [FrotaController::class, 'destroy']);
});

require __DIR__.'/auth.php';
