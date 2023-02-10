<?php

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


Route::get('/api/users', function (Request $request) {
    $data = new UserResource(User::all());
    return response()->json($data);
});

Route::get('/api/veiculos', function (Request $request) {
    $data = Veiculo::query()->with(["frotas","users"])->get();
    return response()->json($data);
});
Route::get('/api/park', function (Request $request) {
    $data = Floor::query()->with("zones.spots")->get();

    return response()->json($data);
});
