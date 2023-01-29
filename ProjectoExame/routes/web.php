<?php

use App\Http\Controllers\ClienteController;
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
