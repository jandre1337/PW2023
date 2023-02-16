<?php

namespace App\Http\Controllers;

use App\Http\Services\PisoService;
use App\Models\Parque;
use App\Models\Piso;
use App\Models\User;
use App\Models\Veiculo;
use App\Models\Zona;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pisos = Piso::all();
        $bilhetes_por_piso = [];
        $contador = 0;
        foreach ($pisos as $piso) {
            foreach ($piso->zonas as $zona) {
                $contador += $zona->qtdd_lugares;
            }
            $bilhetes_por_piso += [['n_piso'=>$piso->n_piso, 'count'=>$contador]];
        }



        return view('piso-list',
            [
                'pisos' => Piso::all(),
                'bilhetes_por_piso' => $bilhetes_por_piso

            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (auth()->user()->can("create", Veiculo::class)){
            return view('piso-new',
                ['id' => $id]); }
        else {
            return redirect()->back()->with('warning','não tens permissões.');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $id , PisoService $pisoService)
    {
        if (auth()->user()->can("create", Piso::class)){
        request()->validate([
            'n_piso' => 'required'
        ]);
        $pisoService->criarPiso($request, $id);
        }
        else { return redirect()->back();}


        return redirect("/pisos");
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
        if (auth()->user()->can("create", Veiculo::class)) {
            $piso = Piso::where('id', $id)->first();

            return view('piso-edit',
                [
                    'piso' => $piso,
                    'zonas' => $piso->zonas,
                    'parques' => Parque::all(),
                    'selectedParque' => $piso->parque_id
                ]);

        }else { return redirect()->back();}
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
            'n_piso' => 'required',
            'parque_id' => 'required'
        ]);

        $piso = Piso::where('id', $id)->first();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado == "on",
            'parque_id' => $request->parque_id
        ])->save();

        return redirect('/pisos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->can("delete", Piso::class)) {
            $piso = Piso::where('id', $id)->first();
            $piso->delete();
        return redirect("/pisos");
        }else { return redirect()->back();}
    }
}
