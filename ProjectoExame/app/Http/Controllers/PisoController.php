<?php

namespace App\Http\Controllers;

use App\Models\Piso;
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
    public function create()
    {
        return view('piso-new');
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
            'n_piso' => 'required',
            'estado' => 'required',
            'qtdd_lugares' => 'required',
            'parque_id' => 'required'
        ]);

        $piso = new Piso();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado,
            'qtdd_lugares' => $request->qtdd_lugares,
            'parque_id' => $request->parque_id
        ])->save();

        return redirect("/tarifario-list");
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
            ['piso' => $piso]);
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
            'estado' => 'required',
            'qtdd_lugares' => 'required',
            'parque_id' => 'required'
        ]);

        $piso = Piso::where('id', $id)->first();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado,
            'qtdd_lugares' => $request->qtdd_lugares,
            'parque_id' => $request->parque_id
        ])->save();

        return redirect("/tarifario-list");
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
