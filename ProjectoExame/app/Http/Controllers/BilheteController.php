<?php

namespace App\Http\Controllers;



use App\Models\Bilhete;
use App\Models\Lugar;
use App\Models\Parque;
use App\Models\Piso;
use App\Models\User;
use App\Models\Veiculo;
use App\Models\Zona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BilheteController extends Controller
{

    public function create()
    {
        return view('bilhete',
        [
            'bilhetes'=> Bilhete::all(),
            'zonas'=> Zona::all(),

        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'matricula' => 'required',
            'zona_id' => 'required',
        ]);
        $veiculo = Veiculo::where('matricula', $request->matricula)->first();

        $bilhete = new Bilhete();

        $bilhete->fill([
            'zona_id' => $request->zona_id,
            'matricula' => $request->matricula,
            'data_entrada' => Carbon::now(),
            'veiculo_id' => $veiculo != null? $veiculo->id : null
        ])->save();

        return redirect("/bilhete");
    }

    public function edit(Request $request)
    {
        $bilhete = Bilhete::where('id', $request->bilhete_id)->first();
        $diff_date = abs(strtotime($bilhete->data_entrada) - strtotime(Carbon::now()));
        $bilhete->data_saida = Carbon::now();
        $bilhete->save();
        $years = floor($diff_date / (365*60*60*24));
        $months = floor(($diff_date - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = ceil(($diff_date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        $preco_a_pagar = $bilhete->zona->valor_zona * $hours;
        return view('bilhete-pagar',
            [
                'bilhete'=> $bilhete,
                'hours'=> $hours,
                'preco_a_pagar'=> $preco_a_pagar,
            ]);
    }

    public function update(Request $request)
    {

    }
}
