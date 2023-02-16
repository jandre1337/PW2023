<?php

namespace App\Http\Services;


use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BilheteService
{
    public function criarBilhete(Request $request)
    {
        $veiculo = Veiculo::where('matricula', $request->matricula)->first();

        $bilhete = new Bilhete();

        $lugares_disponiveis = Lugar::where('veiculo_id',null)->Where('zona_id',$request->zona_id)->get();
        $lugar = $lugares_disponiveis[rand(0,$lugares_disponiveis->count())];
        $lugar->fill([
            'veiculo_id' => $veiculo != null? $veiculo->id : null,
            'estado' =>1,
        ])->save();

        $bilhete->fill([
            'zona_id' => $request->zona_id,
            'matricula' => $request->matricula,
            'data_entrada' => Carbon::now(),
            'veiculo_id' => $veiculo != null? $veiculo->id : null,
            'lugar_id' => $lugar->id
        ])->save();

    }
    public function editarBilhete(Request $request){
        $bilhete = Bilhete::where('id', $request->bilhete_id)->first();
        $diff_date = abs(strtotime($bilhete->data_entrada) - strtotime(Carbon::now()));
        $bilhete->data_saida = Carbon::now();
        $bilhete->save();

        $years = floor($diff_date / (365*60*60*24));
        $months = floor(($diff_date - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = ceil(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        $preco_a_pagar = $bilhete->zona->valor_zona * $hours;

        return [
            'preco' => $preco_a_pagar,
            'hours' => $hours
        ];


    }

    public function atualizarBilhete(Request $request, int $id){

        $bilhete = Bilhete::where('id', $id)->first();
        $lugar = Lugar::where('id', $bilhete->lugar_id)->first();
        $lugar->estado = 0;
        $lugar->veiculo_id = null;
        $lugar->save();

    }
}
