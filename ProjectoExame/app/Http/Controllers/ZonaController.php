<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Piso;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zona-list',
            ['zonas' => Zona::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('zona-new',
        [
            'pisos' => Piso::all(),
            'selectedPiso' => 0
        ]);
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
            'tipo_zona' => 'required',
            'valor_zona' => 'required',
            'piso_id' => 'required',
            'qtdd_lugares' => 'required'
        ]);

        $zona = new Zona();

        $zona->fill([
            'tipo_zona' => $request->tipo_zona,
            'valor_zona' => $request->valor_zona,
            'piso_id' => $request->piso_id,
            'qtdd_lugares' => $request->qtdd_lugares,
        ])->save();

        for ($n_lugar = 1; $n_lugar <= $request->qtdd_lugares; $n_lugar++) {
            $lugar = new Lugar();
            $lugar->fill([
                'n_lugar' => $n_lugar,
                'estado' => 0,
                'vip' => 0,
                'zona_id' => $zona->id
            ])->save();
        }

        return redirect("/zonas");
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
        $zona = Zona::where('id', $id)->first();
        return view('zona-edit',
            [
                'zona' => $zona,
                'pisos' => Piso::all(),
                'selectedPiso' => $zona->piso_id,
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
        request()->validate([
            'tipo_zona' => 'required',
            'valor_zona' => 'required',
            'piso_id' => 'required'
        ]);

        $zona = Zona::where('id', $id)->first();

        $zona->fill([
            'tipo_zona' => $request->tipo_zona,
            'valor_zona' => $request->valor_zona,
            'piso_id' => $request->piso_id
        ])->save();

        return redirect("/zonas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = Zona::where('id', $id)->first();
        $zona->delete();
        return redirect("/zonas");
    }
}
