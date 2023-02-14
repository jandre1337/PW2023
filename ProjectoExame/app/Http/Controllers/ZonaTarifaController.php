<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\ZonaTarifa;
use Illuminate\Http\Request;

class ZonaTarifaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tarifa_id)
    {
        $zonas = Zona::all();
        return view('zonatarifa-new',
            [
                'tarifa_id' => $tarifa_id,
                'zonas' => $zonas,
                'selectedZona' => 0,
                'selectedModalidade' => 0
            ]
        );
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
            'zona_id' => 'required',
            'tarifa_id' => 'required',
            'data_entrada' => 'required',
            'data_saida' => 'required',
            'modalidade' => 'required',
            'tamanho_frota' => 'required'
        ]);

        $zonatarifa = new ZonaTarifa();

        $zonatarifa->fill([
            'zona_id' => $request->zona_id,
            'tarifa_id' => $request->tarifa_id,
            'data_entrada' => $request->data_entrada,
            'data_saida' => $request->data_saida,
            'modalidade' => $request->modalidade,
            'tamanho_frota' => $request->tamanho_frota
        ])->save();

        return redirect("/zonatarifa-list");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zonatarifa = ZonaTarifa::where('id', $id)->first();

        return view('zonatarifa-edit',
            ['zonatarifa' => $zonatarifa]);
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
        request()->validate([
            'zona_id' => 'required',
            'tarifa_id' => 'required',
            'data_entrada' => 'required',
            'data_saida' => 'required',
            'modalidade' => 'required',
            'tamanho_frota' => 'required'
        ]);

        $zonatarifa = ZonaTarifa::where('id', $id)->first();

        $zonatarifa->fill([
            'zona_id' => $request->zona_id,
            'tarifa_id' => $request->tarifa_id,
            'data_entrada' => $request->data_entrada,
            'data_saida' => $request->data_saida,
            'modalidade' => $request->modalidade,
            'tamanho_frota' => $request->tamanho_frota
        ])->save();

        return redirect("/zonatarifa-list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonatarifa = ZonaTarifa::where('id', $id)->first();
        $zonatarifa->delete();
        return redirect("/zonatarifas");
    }
}
