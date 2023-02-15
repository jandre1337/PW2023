<?php

namespace App\Http\Services;


use App\Models\Bilhete;
use App\Models\Frota;
use App\Models\Lugar;
use App\Models\Veiculo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteServices
{
    public function criarCliente(Request $request)
    {
        $cliente = new User();

        $cliente->fill([
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'password' => Hash::make($request->Password)
        ])->save();



    }
    public function editarCliente(Request $request, int $cc){
        $cliente = User::where('cc', $cc)->first();



        return $cliente;
    }

    public function atualizarCliente(Request $request, int $cc){

        $cliente = User::where('cc', $cc)->first();
        $cliente->fill([
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'Password' => Hash::make($request->Password)
        ])->save();
    }
}
