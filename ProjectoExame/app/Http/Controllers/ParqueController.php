<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use App\Models\Piso;
use App\Models\User;
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
        return view('parque-list',
            ['parques' => Parque::all()]);
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
            'estado' => $request->estado?1:0
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
            ['parque' => $parque]);
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
            'estado' => 'required|max:1',
        ]);

        $parque = Parque::where('id', $id)->first();

        $parque->fill([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'estado' => $request->estado
        ])->save();

        return redirect("/parque");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
