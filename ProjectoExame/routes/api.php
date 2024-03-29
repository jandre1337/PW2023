<?php

use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\LugarApiController;
use App\Http\Controllers\Api\ParqueApiController;
use App\Http\Controllers\Api\VeiculoApiController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Veiculo;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/parques')->group(function () {
    Route::get('/', [ParqueApiController::class, 'index']);
    Route::post('/', [ParqueApiController::class, 'store']);
    Route::get('/{id}', [ParqueApiController::class, 'show']);
    Route::put('/{id}', [ParqueApiController::class, 'update']);
    Route::delete('/{id}', [ParqueApiController::class, 'delete']);
});

Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClienteApiController::class, 'index']);
    Route::post('/', [ParqueApiController::class, 'store']);
    Route::get('/{id}', [ClienteApiController::class, 'show']);
    Route::put('/{id}', [ParqueApiController::class, 'update']);
    Route::delete('/{id}', [ParqueApiController::class, 'delete']);
});

Route::prefix('/veiculos')->group(function () {
    Route::get('/', [VeiculoApiController::class, 'index']);
    Route::get('/{matricula}', [VeiculoApiController::class, 'show']);
});

Route::prefix('/lugares')->group(function () {
    Route::get('/', [LugarApiController::class, 'index']);
    Route::get('/{zona_id}', [LugarApiController::class, 'show']);
});



