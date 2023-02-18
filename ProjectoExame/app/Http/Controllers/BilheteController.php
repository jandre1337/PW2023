<?php

namespace App\Http\Controllers;



use App\Http\Services\BilheteService;
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

    public function bilhete_form()
    {


        return view('bilhete',
        [
            'bilhetes'=> Bilhete::all(),
            'zonas'=> Zona::all(),

        ]);
    }

    public function criar_bilhete(Request $request, BilheteService $bilheteService)
    {
        request()->validate([
            'matricula' => 'required',
            'zona_id' => 'required',
        ]);

        $bilheteService->criarBilhete($request);

        return redirect("/bilhete");
    }

    public function pagar_form(Request $request, BilheteService $bilheteService)
    {
        $preco_a_pagar = $bilheteService->detalhesBilhete($request);

        return view('bilhete-pagar',
            [
                'bilhete'=> Bilhete::where('id', $request->bilhete_id)->first(),
                'preco_a_pagar'=> $preco_a_pagar['preco'],
                'hours'=> $preco_a_pagar['hours'],
                'saldo'=> $preco_a_pagar['saldo'],
                'tem_saldo_suficiente'=> $preco_a_pagar['tem_saldo_suficiente']
            ]);
    }

    public function pagar_submit(Request $request, BilheteService $bilheteService, $id)
    {
        $bilheteService->pagarBilhete($request, $id);
        return redirect("/bilhete");
    }
}
