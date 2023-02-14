<?php

namespace App\Http\Controllers\Api;

use App\DTO\ClienteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParqueFormRequest;
use App\Models\Veiculo;

class VeiculoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return response()->json($veiculos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ParqueFormRequest $request)
    {
        $validated = $request->validated();
        $parqueDTO = new ParqueDTO($validated['zone_id'], $validated['localizacao'],$validated['estado']);
        return response()->json(['message' => 'Parque criado'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function show(int $matricula)
    {
        $veiculo = Veiculo::where('matricula', $matricula)->first();
        return response()->json($veiculo, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function update(ParqueFormRequest $request, int $parque_id)
    {
        $validated = $request->validate([
            'zone_id' => 'required',
        ]);
        $parque = Parque::where('id', $parque_id)->first();
        $parque->update($validated);
        return response()->json(['message' => 'Parque atualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $parque_id)
    {
        $parque = Parque::where('id', $parque_id)->first();
        $parque->delete();
        return response()->json(['message' => 'Parque removido'], 204);
    }

}
