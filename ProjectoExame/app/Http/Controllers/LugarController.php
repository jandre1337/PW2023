<?php

namespace App\Http\Controllers;

use App\Models\Frota;
use App\Models\Lugar;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'n_lugar' => 'required'
        ]);

        $lugar = new Lugar();

        $lugar->fill([
            'n_lugar' => $request->n_lugar,
            'estado' => $request->estado == "on",
            'vip' => $request->vip == "on",
            'veiculo_id' => $request->veiculo_id,
            'frota_id' => $request->frota_id
        ])->save();

        return redirect("/lugar-list");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lugar = Lugar::where('id', $id)->first();
        $frotas = Frota::all();
        $veiculos = Veiculo::all();

        return view('lugar-edit',
            [
                'lugar' => $lugar,
                'frotas' => $frotas,
                'veiculos' => $veiculos,

            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $lugar = Lugar::where('id', $id)->first();

        $lugar->fill([
            'estado' => $request->estado != null,
            'vip' => $request->vip != null,
            'veiculo_id' => $request->veiculo_id,
            'frota_id' => $request->frota_id
        ])->save();

        return redirect("/zonas/".$lugar->zona_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lugar = Lugar::where('id', $id)->first();
        $lugar->delete();
        return redirect("/lugares");
    }
}
