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
            'veiculo_id' => $veiculo->id,
            'zona_id' => $request->zona_id,
            'data_entrada' => Carbon::now()
        ])->save();

        return redirect("/bilhete");
    }
}
