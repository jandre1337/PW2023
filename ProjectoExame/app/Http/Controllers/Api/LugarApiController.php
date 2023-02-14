<?php

namespace App\Http\Controllers\Api;

use App\DTO\ClienteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteFormRequest;
use App\Models\Lugar;

class LugarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares = Lugar::all();
        return response()->json($lugares);
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
    public function show(int $zona_id)
    {
        $lugar = Lugar::where('zona_id', $zona_id)->get();
        return response()->json($lugar, 200);
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
