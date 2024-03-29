<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tarifario-list',
            ['tarifario' => Tarifa::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifario-new');
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
            'preco' => 'required',
            'taxa_extra' =>'required',
            'desconto' => 'required'
        ]);

        $tarifa = new Tarifa();

        $tarifa->fill([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'taxa_extra' => $request->taxa_extra,
            'desconto' => $request->desconto
        ])->save();

        return redirect("/tarifarios");
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
        $tarifa = Tarifa::where('id', $id)->first();

        return view('tarifario-edit',
            ['tarifa' => $tarifa]);
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
            'preco' => 'required',
            'taxa_extra' =>'required',
            'desconto' => 'required'
        ]);

        $tarifa = Tarifa::where('id', $id)->first();

        $tarifa->fill([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'taxa_extra' => $request->taxa_extra,
            'desconto' => $request->desconto
        ])->save();

        return redirect("/tarifarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarifa = Tarifa::where('id', $id)->first();
        $tarifa->delete();
    }
}
