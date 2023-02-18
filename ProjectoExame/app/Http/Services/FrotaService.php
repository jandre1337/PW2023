<?php

namespace App\Http\Services;


use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Piso;
use App\Models\Frota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrotaService
{
    public function criarFrota(Request $request)
    {
        $frota = new Frota();

        $frota->fill([
            'nome' => $request->nome,
            'tamanho_frota' => 0,
            'user_id' => $request->user()->getKey(),
            'modalidade' => $request->modalidade
        ])->save();


    }
    public function editarFrota(Request $request, string $cc){


    }

    public function atualizarBilhete(Request $request, int $id){

        $bilhete = Bilhete::where('id', $id)->first();
        $lugar = Lugar::where('id', $bilhete->lugar_id)->first();
        $lugar->estado = 0;
        $lugar->veiculo_id = null;
        $lugar->save();

    }
}
