<?php

namespace App\Http\Controllers;


use App\Http\Services\ClienteServices;
use App\Models\Frota;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cliente-list',
            ['clientes' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ClienteServices $clienteService)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'cc' => 'required|max:10|unique:users,cc',
            'password' => 'required|min:6'
        ]);
        $clienteService->criarCliente($request);

        return redirect("/clientes");
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
    public function edit(Request $request, int $cc, ClienteServices $clienteServices)
    {

            $lista = $clienteServices->editarCliente($request, $cc);

            return view('cliente-edit',
                [
                    'cliente' => $lista
                ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $cc, ClienteServices $clienteServices)
    {
            request()->validate([
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'cc' => 'required|max:10|unique:users,cc',
            ]);
            $clienteServices->atualizarCliente($request, $cc);
        return redirect("/clientes");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function destroy($cc)
    {
        $cliente = User::where('cc', $cc)->first();
        $cliente->delete();
        return redirect("/clientes");
    }


    public function saldo_form(Request $request,int $bilhete_id)
    {
        return view('cliente-saldo',
            [
                'user' => User::where('id', $request->user()->getKey())->first(),
                'bilhete_id' => $bilhete_id
            ]);
    }

    public function saldo_submit(Request $request,int $bilhete_id)
    {
        $user = User::where('id', $request->user()->getKey())->first();
        $user->saldo = $request->saldo;
        $user->save();
        return redirect()->action([BilheteController::class, 'pagar_form'], ['bilhete_id' => $bilhete_id]);
    }
}
