<?php

namespace App\Http\Services;


use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Pagamento;
use App\Models\User;
use App\Models\Veiculo;
use App\Models\ZonaTarifa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BilheteService
{
    public function criarBilhete(Request $request)
    {
        $veiculo = Veiculo::where('matricula', $request->matricula)->first();

        $bilhete = new Bilhete();

        $lugares_disponiveis = Lugar::where('veiculo_id',null)->Where('zona_id',$request->zona_id)->get();
        $lugar = $lugares_disponiveis[rand(0,$lugares_disponiveis->count()-1)];
        $lugar->fill([
            'veiculo_id' => $veiculo != null? $veiculo->id : null,
            'estado' =>1,
            'bemparado' => random_int(0,1)
        ])->save();

        $bilhete->fill([
            'zona_id' => $request->zona_id,
            'matricula' => $request->matricula,
            'data_entrada' => Carbon::now(),
            'veiculo_id' => $veiculo != null? $veiculo->id : null,
            'lugar_id' => $lugar->id
        ])->save();
    }

    public function detalhesBilhete(Request $request){
        $bilhete = Bilhete::where('id', $request->bilhete_id)->first();
        $diff_date = abs(strtotime($bilhete->data_entrada) - strtotime(Carbon::now()));
        $bilhete->data_saida = Carbon::now();
        $bilhete->save();

        $years = floor($diff_date / (365*60*60*24));
        $months = floor(($diff_date - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = ceil(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        //zona tarifa -> * 1/tamanho frota
        //zona tarifa -> modalidade anual/mensal/diario = .7 .8 .9
        //tamanho frota * modalidadae * horas * taxa_zona

        // Existe veiculo numa frota
        if ($bilhete->veiculo_id != null) {
            switch ($bilhete->veiculo->frota->modalidade) {
                case "Anual":
                    $precopormodalidade = 0.7;
                    break;
                case "Mensal":
                    $precopormodalidade = 0.8;
                    break;
                case "Diario":
                    $precopormodalidade = 0.9;
                    break;
                Default:
                    $precopormodalidade = 1;
                    break;
            }

            $preco_a_pagar =  $precopormodalidade * (1/$bilhete->veiculo->frota->tamanho_frota) * ($bilhete->zona->valor_zona * $hours);
        } else {
            $preco_a_pagar = $bilhete->zona->valor_zona * $hours;
        }
        $saldo = User::where('id', $request->user()->getKey())->first()->saldo;
        $tem_saldo_suficiente = $saldo > $preco_a_pagar;
        return [
            'preco' => $preco_a_pagar,
            'hours' => $hours,
            'tem_saldo_suficiente' => $tem_saldo_suficiente,
            'saldo' => $saldo
        ];
    }

    public function pagarBilhete(Request $request, int $id){

        $bilhete = Bilhete::where('id', $id)->first();
        $lugar = Lugar::where('id', $bilhete->lugar_id)->first();
        $lugar->estado = 0;
        $lugar->veiculo_id = null;
        $lugar->save();
        $pagamento = new Pagamento();
        $pagamento->fill([
            'preco_final' => $request->preco_a_pagar,
            'estado_pagamento' => "Pago",
            'data_pagamento' => Carbon::now(),
            'user_id' => $request->user()->getKey()
        ]);
        $pagamento->save();
        $user = User::where('id', $request->user()->getKey())->first();
        $user->saldo = $user->saldo - $request->preco_a_pagar;
        $user->save();
    }
}
