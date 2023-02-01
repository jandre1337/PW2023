<?php

namespace App\Http\Controllers;

use App\Models\Frota;
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
    public function edit($cc)
    {
        $cliente = User::where('cc', $cc)->first();
        $frotas = Frota::where('user_id', $cc);
        return view('cliente-edit',
            [
                'cliente' => $cliente,
                'frotas' => $frotas
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cc)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'cc' => 'required|max:10',
            'password' => 'required|min:6'
        ]);

        $cliente = User::where('cc', $cc)->first();
        $cliente->fill([
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'Password' => Hash::make($request->Password)
        ])->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function destroy($cc)
    {
        $customer = Customers::where('cc', $cc)->first();
        $customer->delete();
        return redirect("/customers");
    }
}
