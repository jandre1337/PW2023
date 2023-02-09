<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use App\Models\Piso;
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
        return view('piso-list',
            ['pisos' => Piso::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('piso-new',
            ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $id)
    {
        request()->validate([
            'n_piso' => 'required',
            'lugares' => 'required'
        ]);

        $piso = new Piso();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado == "on",
            'qtdd_lugares' => $request->lugares,
            'parque_id' => $id
        ])->save();

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
        $piso = Piso::where('id', $id)->first();

        return view('piso-edit',
            [
                'piso' => $piso,
                'zonas' => $piso->zonas,
                'parques' => Parque::all(),
                'selectedParque' => $piso->parque_id
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
            'n_piso' => 'required',
            'qtdd_lugares' => 'required',
            'parque_id' => 'required'
        ]);

        $piso = Piso::where('id', $id)->first();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado == "on",
            'qtdd_lugares' => $request->qtdd_lugares,
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
        $piso = Piso::where('id', $id)->first();
        $piso->delete();
        return redirect("/pisos");
    }
}
