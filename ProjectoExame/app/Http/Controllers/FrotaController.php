<?php

namespace App\Http\Controllers;

use App\Models\Frota;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class FrotaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frotas =  Frota::all();
        $tamanho_frota = [];
        foreach ($frotas as $frota) {
            $veiculos = Veiculo::where('frota_id', $frota->id)->get();
            $tamanho_frota[$frota->id] = $veiculos->count();
        }
        return view('frota-list',
            [
                'frotas' =>$frotas,
                'tamanho_frota' => $tamanho_frota
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frota-new',
            [
                'selectedModalidade' => 0
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
            'nome' => 'required'
        ]);

        $frota = new Frota();

        $frota->fill([
            'nome' => $request->nome,
            'tamanho_frota' => 0,
            'user_id' => $request->user()->getKey()
        ])->save();

        return redirect("/frotas");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frota = Frota::where('id', $id)->first();
        $veiculos = Veiculo::where('frota_id', $id)->get();
        return view('frota-edit',
            [
                'frota' => $frota,
                'veiculos' => $veiculos,
                'selectedModalidade' => 0
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nome' => 'required',
            'tamanho_frota' => 'required'
        ]);

        $frota = Frota::where('id', $id)->first();

        $frota->fill([
            'user_id' => $request->user_id,
            'tamanho_frota' => $request->tamanho_frota
        ])->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frota = Frota::where('id', $id)->first();
        $frota->delete();
        return redirect("/frotas");
    }
}
