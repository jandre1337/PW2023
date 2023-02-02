<?php

namespace App\Http\Controllers;

use App\Models\Frota;
use App\Models\User;
use Illuminate\Http\Request;

class FrotaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frota-list',
            ['frotas' => Frota::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frota-new');
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
            'tamanho_frota' => 'required'
        ]);

        $frota = new Frota();

        $frota->fill([
            'tamanho_frota' => $request->tamanho_frota,
            'user_id' => $request->user_id
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
        $frota = Frota::where('user_id', $id);
        return view('cliente-edit',
            [
                'frota' => $frota
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
