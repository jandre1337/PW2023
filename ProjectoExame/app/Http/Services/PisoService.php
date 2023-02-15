<?php

namespace App\Http\Services;


use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Piso;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PisoService
{
    public function criarPiso(Request $request, int $id)
    {
        $piso = new Piso();

        $piso->fill([
            'n_piso' => $request->n_piso,
            'estado' => $request->estado == "on",
            'qtdd_lugares' => $request->lugares,
            'parque_id' => $id
        ])->save();

    }
    public function editarBilhete(Request $request, string $cc){
        $bilhete = Bilhete::where('id', $request->bilhete_id)->first();
        $diff_date = abs(strtotime($bilhete->data_entrada) - strtotime(Carbon::now()));
        $bilhete->data_saida = Carbon::now();
        $bilhete->save();

        $years = floor($diff_date / (365*60*60*24));
        $months = floor(($diff_date - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = ceil(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        $preco_a_pagar = $bilhete->zona->valor_zona * $hours;

        return $preco_a_pagar;

    }

    public function atualizarBilhete(Request $request, int $id){

        $bilhete = Bilhete::where('id', $id)->first();
        $lugar = Lugar::where('id', $bilhete->lugar_id)->first();
        $lugar->estado = 0;
        $lugar->veiculo_id = null;
        $lugar->save();

    }
}
