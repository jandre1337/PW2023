<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Parque;
use App\Models\Piso;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parques = Parque::all();
        $lugares_livres = [];
        foreach ($parques as $parque) {
            $lugares_livres[$parque->id] = 0;
            //$pisos = Piso::where('parque_id', $parque->id)->get();
            foreach ( $parque->pisos as $piso){
                //$zonas = Zona::where('piso_id', $piso->id)->get();
                foreach ( $piso->zonas as $zona) {
                    //$lugares = Lugar::where('zona_id', $zona->id)->get();
                    foreach ( $zona->lugares as $lugar) {
                        if ($lugar->estado == 0) {
                            $lugares_livres[$parque->id] = $lugares_livres[$parque->id] + 1;
                        }
                    }
                }
            }
        }
        return view('parque-list',
            [
                'parques' => $parques,
                'lugares_livres' => $lugares_livres
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parque-new');
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
            'nome' => 'required',
            'localizacao' => 'required'
        ]);

        $parque = new Parque();

        $parque->fill([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'estado' => $request->estado == "on",
        ])->save();

        return redirect("/parques");
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

        $parque = Parque::where('id', $id)->first();
        return view('parque-edit',
            [
                'parque' => $parque,
                'pisos' => $parque->pisos
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
            'nome' => 'required',
            'localizacao' => 'required',
        ]);

        $parque = Parque::where('id', $id)->first();

        $parque->fill([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'estado' => $request->estado == "on",
        ])->save();

        return redirect("/parques");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parque = Parque::where('id', $id)->first();
        $parque->delete();
        return redirect("/parques");
    }
}
