<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
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
            'n_lugar' => 'required',
            'taxa_lugar' => 'required',
            'zona_id' => 'required'
        ]);

        $lugar = new Lugar();

        $lugar->fill([
            'n_lugar' => $request->n_lugar,
            'taxa_lugar' => $request->taxa_lugar,
            'zona_id' => $request->zona_id
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

        return view('lugar-edit',
            ['lugar' => $lugar]);
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
            'n_lugar' => 'required',
            'taxa_lugar' => 'required',
            'zona_id' => 'required'
        ]);

        $lugar = new Lugar();

        $lugar->fill([
            'n_lugar' => $request->n_lugar,
            'taxa_lugar' => $request->taxa_lugar,
            'zona_id' => $request->zona_id
        ])->save();

        return redirect("/lugar-list");
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
