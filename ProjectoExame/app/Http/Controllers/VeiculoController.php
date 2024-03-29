<?php

namespace App\Http\Controllers;

use App\Models\Frota;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('veiculo-list',
            [
                'veiculos' => Veiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (auth()->user()->can("create", Veiculo::class)){
            return view('veiculo-new',[
                'frotas' =>  Frota::where('user_id', $request->user()->getKey())->get(),
                'selectedFrota' => 0,
            ]);
        } else { return redirect()->back();}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->can("create", Veiculo::class)){
            request()->validate([
                'matricula' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'ano' => 'required',
                'frota_id' => 'required'
            ]);
            $veiculo = new Veiculo();

            $veiculo->fill([
                'matricula' => $request->matricula,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'ano' => $request->ano,
                'user_id' => $request->user()->getKey(),
                'frota_id' => $request->frota_id,
            ])->save();
        } else { return redirect()->back();}

        $frota = Frota::where('id', $request->frota_id)->first();
        $veiculos_da_frota = Veiculo::where('frota_id', $request->frota_id)->get();
        $frota->tamanho_frota = $veiculos_da_frota->count();
        $frota->save();

        return redirect("/veiculos");
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
    public function edit(Request $request,$id)
    {
        $veiculo = Veiculo::where('id', $id)->first();
        return view('veiculo-edit',
            [
                'veiculo' =>  $veiculo,
                'frotas' =>  Frota::where('user_id', $request->user()->getKey())->get(),
                'selectedFrota' => $veiculo->frota_id,
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
            'matricula' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'frota_id' => 'required'
        ]);

        $veiculo = Veiculo::where('id', $id)->first();
        $frota_antiga = Frota::where('id', $veiculo->frota_id)->first();
        $frota_nova = Frota::where('id', $request->frota_id)->first();

        $veiculo->fill([
            'matricula' => $request->matricula,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'frota_id' => $request->frota_id,
        ])->save();

        $frota_antiga->tamanho_frota = Veiculo::where('frota_id',$frota_antiga->id)->get()->count();
        $frota_nova->tamanho_frota = Veiculo::where('frota_id',$frota_nova->id)->get()->count();
        $frota_antiga->save();
        $frota_nova->save();

        return redirect("/veiculos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo = Veiculo::where('id', $id)->first();
        $frota = Frota::where('id', $veiculo->frota_id)->first();
        $veiculo->delete();

        $veiculos_da_frota = Veiculo::where('frota_id', $veiculo->frota_id)->get();
        $frota->tamanho_frota = $veiculos_da_frota->count();
        $frota->save();

        return redirect("/veiculos");
    }
}
